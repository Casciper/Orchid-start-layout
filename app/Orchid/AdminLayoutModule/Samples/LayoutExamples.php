<?php

    namespace App\Orchid\AdminLayoutModule\Samples;

    use Illuminate\Support\Facades\Storage;
    use Orchid\Screen\Actions\Link;
    use Orchid\Screen\Layouts\Table;
    use Orchid\Screen\Repository;
    use Orchid\Screen\TD;

    class LayoutExamples extends Table
    {
        protected $target = 'items';
        protected string $updateRoute = 'platform.name.edit';

        protected function columns(): iterable
        {
            return [
                TD::make('title', 'Title'),
                TD::make('img', 'Image')->render(function (Repository $event) {
                    if(!empty($event->img)) {
                        $img = Storage::url($event->img);
                        return "<img src=\"{$img}\" height='150' width='150'>";
//                        "<img src='https://picsum.photos/450/200?random={$model->get('id')}'
//                              alt='sample'
//                              class='mw-100 d-block img-fluid'>
//                            <span class='small text-muted mt-1 mb-0'># {$model->get('id')}</span>";
                    }
                    return 'no image';
                }),

                TD::make('owner', 'Host')->render(fn (Repository $event) => $event->host->login),
                TD::make('category_id', 'Category')->render(fn (Repository $event) => $event->category->title),
                TD::make('created_at', 'Created at')->width(100)->alignRight()
                    ->render(fn (Repository $event) => $event->created_at?->format('d-m-Y')),
                TD::make()->width(10)->alignRight()->render(function (Repository $event) {
                    return Link::make()->icon('wrench')
                        ->route($this->updateRoute, $event);
                }),

                TD::make('title'),
                TD::make('description'),
                TD::make('created_at', 'Дата')->width(100)->alignRight()
                    ->render(fn (Repository $category) => $category->created_at?->format('d-m-Y')),

                TD::make()->width(10)->alignRight()->render(function (Repository $category) {
                    return Link::make()->icon('wrench')
                        ->route($this->updateRoute, $category);
                }),
            ];
        }
    }
