<?php

    namespace App\Orchid\AdminLayoutModule\Samples;

    use App\Orchid\RocontModule\Traits\CommandBarDeletableTrait;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Orchid\Screen\Fields\CheckBox;
    use Orchid\Screen\Fields\Input;
    use Orchid\Screen\Fields\Quill;
    use Orchid\Screen\Fields\TextArea;
    use Orchid\Support\Facades\Layout;

    class ExampleEditScreen
    {
        use CommandBarDeletableTrait;

        protected ?string $listRedirect = 'platform.news.list';

        public function layout(): iterable
        {
            return [
                Layout::rows([
                    Input::make("item.title")->title('Заголовок публикации')->required(),
                    Input::make("item.category_id")->title('Категория')->required(),

                    CheckBox::make('item.active')->sendTrueOrFalse()->title('Активна ли данная публикация'),
                    Quill::make('item.text')->title('Содержание публикации'),

                    Input::make('item.meta_title')->title('Мета-заголовок'),
                    TextArea::make('item.meta_description')->title('Мета-описание')
                ]),
            ];
        }

        public function query(ModelName $item)
        {
            return $this->queryMake($item);
        }

        public function save(ModelName $item, Request $request)
        {
            $token = $request->get('_token');
            $data['item'] = $request->input('item');
            $data['item']['code'] = Str::slug($data['item']['title']);
            $request->replace($data);
            $request->request->set('_token', $token);

            return $this->saveItem($item, $request);
        }

        public function remove(ModelName $item)
        {
            return $this->removeItem($item);
        }
    }
