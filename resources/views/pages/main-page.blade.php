@extends('welcome')

@section('content')
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            @foreach($slides as $slide)
            @if($slide->layout === '/all-items')
                    <div class="text-left item bg-img" data-overlay-dark="3" data-background="{{ $slide->image }}">
                        <div class="v-middle caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 mt-30">
                                        <div class="o-hidden">
                                            <p>{{ $slide->image }}</p>
                                            <h1>{{ $slide->content['title'] }}</h1>
                                            <p>{{ $slide->content['description'] }}</p>
                                            <a href="#form-container" class="btn float-btn flat-btn">{{ $slide->content['first_btn'] }}</a>
                                            <a href="#form-container" class="btn float-btn flat-btn">{{ $slide->content['second_btn'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($slide->layout === '/all-items-one-btn')
                    <div class="text-left item bg-img" data-overlay-dark="3" data-background="{{ $slide->image }}">
                        <div class="v-middle caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 mt-30">
                                        <div class="o-hidden">
                                            <p>{{ $slide->image }}</p>
                                            <h1>{{ $slide->content['title'] }}</h1>
                                            <p>{{ $slide->content['description'] }}</p>
                                            <a href="#form-container" class="btn float-btn flat-btn">{{ $slide->content['first_btn'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($slide->layout === '/without-btn')
                    <div class="text-left item bg-img" data-overlay-dark="3" data-background="{{ $slide->image }}">
                        <div class="v-middle caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 mt-30">
                                        <div class="o-hidden">
                                            <p>{{ $slide->image }}</p>
                                            <h1>{{ $slide->content['title'] }}</h1>
                                            <p>{{ $slide->content['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-left item bg-img" data-overlay-dark="3" data-background="{{ $slide->image }}">
                        <div class="v-middle caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 mt-30">
                                        <div class="o-hidden">
                                            <p>{{ $slide->image }}</p>
                                            <h1>{{ $slide->content['title'] }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </header>
@endsection
