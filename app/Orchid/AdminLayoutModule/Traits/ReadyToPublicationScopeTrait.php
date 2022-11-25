<?php

    namespace App\Orchid\AdminLayoutModule\Traits;

    use Illuminate\Database\Eloquent\Builder;

    trait ReadyToPublicationScopeTrait
    {
        public function scopeReadyToPublication(Builder $query)
        {
            return $query->where('publication_date', '<=', now()->toDateTime());
        }
    }
