<?php

    namespace App\Orchid\AdminLayoutModule\Traits;

    use Illuminate\Database\Eloquent\Builder;

    trait ActiveScopeTrait
    {
        public function scopeActive(Builder $query)
        {
            return $query->where('is_active', 1);
        }
    }
