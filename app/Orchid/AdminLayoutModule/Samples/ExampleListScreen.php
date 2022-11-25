<?php

    namespace App\Orchid\AdminLayoutModule\Samples;

    use App\Orchid\AdminLayoutModule\Abstraction\ListScreenPattern;

    class ExampleListScreen extends ListScreenPattern
    {
        protected int $paginate = 15;
        protected ?string $listRedirect = 'platform.news.list';
        protected ?string $updateRoute = 'platform.news.edit';
        public string $name = 'Список новостей';

        public function query()
        {
//            $this->model = ModelName::query()->orderBy('created_at', 'desc');
            return parent::query();
        }

        public function layout(): iterable
        {
            return [
                LayoutExamples::class,
            ];
        }
    }
