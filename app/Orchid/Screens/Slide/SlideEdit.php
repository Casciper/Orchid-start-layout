<?php

    namespace App\Orchid\Screens\Slide;

    use App\Models\Slide;
    use App\Orchid\AdminLayoutModule\Abstraction\EditScreenPattern;
    use App\Orchid\AdminLayoutModule\Interfaces\ProtoInterface;
    use App\Orchid\AdminLayoutModule\Traits\CommandBarDeletableTrait;
    use Illuminate\Http\Request;
    use Orchid\Screen\Fields\CheckBox;
    use Orchid\Screen\Fields\Cropper;
    use Orchid\Screen\Fields\Input;
    use Orchid\Screen\Fields\Select;
    use Orchid\Support\Facades\Alert;
    use Orchid\Support\Facades\Layout;

    class SlideEdit extends EditScreenPattern
    {
        use CommandBarDeletableTrait;

        protected ?string $listRedirect = 'platform.slides.list';
        protected string $createTitle = 'Создание слайда';
        protected string $updateTitle = 'Редактирование слайда';
        protected string $deleteMessage = 'Слайд успешно удалён';
        protected string $createMessage = 'Слайд успешно добавлен';

        public function layout(): iterable
        {
            return [
                Layout::view('admin.slides.slides-layout')
            ];
        }

        public function query(Slide $item)
        {
            return $this->queryMake($item);
        }

        protected function saveSlideItem(ProtoInterface $item, $data)
        {
            $this->exists = !empty($item->id);

            $item->fill($data['item']);
            $item['content'] = $data['content'];
            $item->save();
            $this->redirectTo();

            $this->updateMessage = $this->updateMessage ?: "Запись [$item->id : $item->title] успешно обновлена";
            $this->createMessage = $this->createMessage ?: "Запись успешно создана";
            $message = $item->exists ? $this->updateMessage : $this->createMessage;

            Alert::info($message);

            return redirect()->route($this->listRedirect, $this->redirectParams);
        }

        public function save(Slide $item, Request $request)
        {
            $data = $request->all();
            return $this->saveSlideItem($item, $data);
        }

        public function remove(Slide $item)
        {
            return $this->removeItem($item);
        }
    }
