@extends('welcome')

@section('content')
    <header class="header slider-fade">
        <div class="main-page-slider">
            @foreach($slides as $slide)
            @if($slide->layout === '/all-items')
                    @include('components.view-slide-layouts.all-items')
                @elseif($slide->layout === '/all-items-one-btn')
                    @include('components.view-slide-layouts.all-items-one-btn')
                @elseif($slide->layout === '/without-btn')
                    @include('components.view-slide-layouts.without-btn')
                @else
                    @include('components.view-slide-layouts.only-title')
                @endif
            @endforeach
        </div>
    </header>
@endsection
