<?php

    namespace App\Orchid\Screens\Slide;

    use App\Models\Slide;
    use App\Orchid\AdminLayoutModule\Abstraction\ListScreenPattern;
    use Illuminate\Http\Request;
    use Orchid\Screen\Actions\Link;
    use Orchid\Screen\Actions\ModalToggle;
    use Orchid\Screen\TD;
    use Orchid\Support\Color;
    use Orchid\Support\Facades\Layout;
    use Orchid\Support\Facades\Toast;

    class SlideList extends ListScreenPattern
    {
        protected ?string $listRedirect = 'platform.slides.list';
        protected ?string $updateRoute = 'platform.slides.edit';
        public string $name = 'Список слайдов';

        public function query()
        {
            $this->model = Slide::query();
            return parent::query();
        }

        public function layout(): iterable
        {
            return [
                Layout::table('items', [
                    TD::make('id', 'ID')->width(60)->alignLeft(),
                    TD::make('title', 'Название')->width(150)->alignLeft(),

                    TD::make('is_active', 'Активно')->render(function ($item) {
                        $icon = $item->isActive() ? 'check' : 'close';
                        $color = $item->isActive() ? Color::SUCCESS() : Color::DANGER();
                        return ModalToggle::make('')->icon($icon)->modal('switchActiveModal')->type($color)
                            ->method('switchDataActive')->asyncParameters(['id' => $item->id]);
                    })->alignCenter()->sort(),

                    TD::make('created_at', 'Дата')->width(100)->alignRight()->render(fn ($item) => $item->created_at?->format('d-m-Y')),
                    TD::make()->width(10)->alignRight()->render(fn ($item) => Link::make()->icon('wrench')->route($this->updateRoute, $item)),
                ]),
                Layout::modal('switchActiveModal',Layout::rows([]))->title('Изменить активность слайда?')
                    ->applyButton('Да')->closeButton('Нет')->async('asyncGetData'),
            ];
        }

        public function asyncGetData(Slide $item)
        {
            return [
                'item' => $item,
            ];
        }

        public function switchDataActive(Request $request)
        {
            $data = $request->query();
            $id = $data['id'];
            $item = Slide::find($id);
            $item->switchActive();
            $item->save();

            if ($item->isActive()) {
                Toast::success('Слайд активирован');
            } else {
                Toast::warning('Слайд деактивирован');
            }
        }
    }
