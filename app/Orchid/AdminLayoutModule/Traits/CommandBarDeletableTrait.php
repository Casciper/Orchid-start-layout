<?php

    namespace App\Orchid\AdminLayoutModule\Traits;

    use Orchid\Screen\Actions\Button;
    use Orchid\Screen\Actions\Link;

    trait CommandBarDeletableTrait
    {
        public function commandBar()
        {
            return [
                Link::make('Назад')->icon('arrow-left-circle')
                    ->route($this->listRedirect, $this->redirectParams),

                Button::make('Сохранить')->icon('note')->method('save'),

                Button::make('Удалить')->icon('trash')->method('remove')->canSee($this->exists)
                ->confirm('Вы уверены, что хотите удалить эту запись?'),
            ];
        }
    }
