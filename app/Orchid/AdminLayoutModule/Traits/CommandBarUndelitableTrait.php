<?php

    namespace App\Orchid\AdminLayoutModule\Traits;

    use Orchid\Screen\Actions\Button;
    use Orchid\Screen\Actions\Link;

    trait CommandBarUndelitableTrait
    {
        public function commandBar()
        {
            return [
                Link::make('Назад')->icon('arrow-left-circle')
                    ->route($this->listRedirect, $this->redirectParams),

                Button::make('Сохранить')
                    ->icon('note')
                    ->method('save'),
            ];
        }
    }
