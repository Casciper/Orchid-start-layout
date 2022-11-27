<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function mainPage()
    {
        $slides = Slide::query()->where('is_active', 1)->get();
        return view('pages.main-page', compact('slides'));
    }
}
