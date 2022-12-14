<?php

    namespace App\Orchid\AdminLayoutModule\Abstraction;

    use App\Orchid\AdminLayoutModule\Interfaces\ProtoInterface;
    use http\Message;
    use Illuminate\Http\Request;
    use Orchid\Screen\Screen;
    use Orchid\Support\Facades\Alert;
    use function redirect;
    use function session;

    abstract class EditScreenPattern extends Screen
    {
        /**
         * Название страницы редактирования. Задаётся вручную или же автоматически подставляется как Updated/Created
         * @var string
         */
        public string $name = '';

        /**
         * Переменная определяющая редактируется ли уже существующая запись или создаётся новая
         * @var bool
         */
        protected bool $exists = false;

        /**
         * Имя роута, на который будет происходить редирект после сохранения записи
         * @var string|null
         */
        protected ?string $listRedirect = null;

        /**
         * Параметры для редиректа к списку моделей (номер страницы)
         * @var array
         */
        protected array $redirectParams = [];

        /**
         * Если true, то произойдёт редирект на основе данных из сессии, если false, то маршрут для перенаправления будет
         * взят из дефолтного значения переменной
         * @var bool
         */
        protected bool $redirectAfterUpdate = true;

        /**
         * Определяет дефолтное значение сообщения об успешном редактировании записи
         * @var string
         */
        protected string $createMessage = '';

        /**
         * Определяет дефолтное значение сообщения об успешном редактировании записи
         * @var string
         */
        protected string $updateMessage = '';

        /**
         * Определяет дефолтное значение сообщения об успешном удалении записи
         * @var string
         */
        protected string $deleteMessage = '';

        /**
         * Определяет дефолтное значение заголовка для редактирования записи
         * @var string
         */
        protected string $updateTitle = 'Редактирование записи';

        /**
         * Определяет дефолтное значение заголовка для удаления записи
         * @var string
         */
        protected string $createTitle = 'Создание записи';

        protected function queryMake($item)
        {
            $this->redirectTo();
            $this->exists = !empty($item->id);

            if (empty($this->name)) {
                $this->name = $item->exists ? $this->updateTitle : $this->createTitle;
            }

            return [
                'item' => $item,
            ];
        }

        protected function saveItem(ProtoInterface $item, $data)
        {
            $this->exists = !empty($item->id);

            $item->fill($data);
            $item->save();
            $this->redirectTo();

            $this->updateMessage = $this->updateMessage ?: "Запись [$item->id : $item->title] успешно обновлена";
            $this->createMessage = $this->createMessage ?: "Запись успешно создана";
            $message = $item->exists ? $this->updateMessage : $this->createMessage;

            Alert::info($message);

            return redirect()->route($this->listRedirect, $this->redirectParams);
        }

        protected function removeItem(ProtoInterface $item)
        {
            $item->delete();
            $this->redirectTo();

            $this->deleteMessage = $this->deleteMessage ?: "Запись [$item->id : $item->title] успешно удалена";
            Alert::warning($this->deleteMessage);

            return redirect()->route($this->listRedirect, $this->redirectParams);
        }

        protected function redirectTo()
        {
            if ($this->redirectAfterUpdate) {
                $this->listRedirect = session()->has('listRedirect') ? session()->get('listRedirect') : $this->listRedirect;
                $this->redirectParams = session()->has('redirectParams') ? session()->get('redirectParams') : $this->redirectParams;
            }
        }
    }
