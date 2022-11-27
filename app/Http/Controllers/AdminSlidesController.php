<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSlidesController extends Controller
{
    public function getAllItems()
    {
        $currentUrl = url()->current();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        return view('admin.slides.style-layout.all-items', compact('currentSlide'));
    }
    public function getOneBtn()
    {
        $currentUrl = url()->current();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        return view('admin.slides.style-layout.all-items-one-btn', compact('currentSlide'));
    }
    public function getOnlyTitle()
    {
        $currentUrl = url()->current();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        return view('admin.slides.style-layout.only-title', compact('currentSlide'));
    }
    public function getWithoutBtn()
    {
        $currentUrl = url()->current();
        $currentSlideId = substr($currentUrl, -1);
        $currentSlide = \App\Models\Slide::query()->where('id', $currentSlideId)->first();
        return view('admin.slides.style-layout.without-btn', compact('currentSlide'));
    }
}
