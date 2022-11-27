<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentUrl = URL::current();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        \View::composer(["admin.slides.slides-layout"], function ($view) use ($currentSlide) {
            $view->with('currentSlide', $currentSlide);
        });

        $currentUrl = URL::previous();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        \View::composer(["admin.slides.style-layout.only-title",
            "admin.slides.style-layout.without-btn",
            "admin.slides.style-layout.all-items-one-btn",
            "admin.slides.style-layout.all-items"
        ], function ($view) use ($currentSlide) {
            $view->with('currentSlide', $currentSlide);
        });
    }
}
