@extends('platform::app')

@section('body-left')

    <style>
        .nav-item span{
            display: none;
        }
        .nav-item .text-muted{
            display: none;
        }
        .nav-item .badge{
            display: none;
        }
    </style>

    <div class="aside col-xs-12 col-md-2 bg-dark closed bg-aside" style="width: 60px;min-width: 60px;max-width: 60px;overflow: hidden">
        <div class="d-md-flex align-items-start flex-column d-sm-block h-full">

            <header class="d-sm-flex d-md-block p-3 mt-md-4 w-100 d-flex align-items-center">
                <a href="#" class="header-toggler me-auto order-first d-flex align-items-center closed"
                   style="width: 40px;height: 0px; position:relative; left: -3px"
                   data-bs-toggle="collapse"
                   data-bs-target="">
                    <x-orchid-icon path="menu" class="icon-menu"/>

                    <span class="ms-2"></span>
                </a>

                <a class="header-brand order-last" href="{{route('platform.index')}}">
                    @includeFirst([config('platform.template.header'), 'platform::header'])
                </a>
            </header>

            <nav class="collapse d-md-block w-100 mb-md-3" id="headerMenuCollapse">

                @include('platform::partials.search')

                @includeWhen(Auth::check(), 'platform::partials.profile')

                <ul class="nav flex-column mb-1 ps-0 left-3">
                    {!! Dashboard::renderMenu(\Orchid\Platform\Dashboard::MENU_MAIN) !!}
                    <li class="d-flex align-items-center">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <span class="me-2 switch-label">Светлая тема</span>
                    </li>
                </ul>

            </nav>

            <div class="h-100 w-100 position-relative to-top cursor d-none d-md-block mt-md-5 divider to-top-btn"
                 data-action="click->html-load#goToTop"
                 title="{{ __('Scroll to top') }}">
                <div class="bottom-left w-100 mb-2 ps-3">
                    <small>
                        <x-orchid-icon path="arrow-up" class="me-2"/>

                        <span>{{ __('Scroll to top') }}</span>
                    </small>
                </div>
            </div>

            <footer class="p-3 mb-2 m-t d-none d-lg-block w-100 made-by">
                @includeFirst([config('platform.template.footer'), 'platform::footer'])
            </footer>

        </div>
    </div>
@endsection

@section('body-right')

    <div class="mt-3 mt-md-4">

        @if(Breadcrumbs::has())
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 mb-2">
                    <x-tabuna-breadcrumbs
                        class="breadcrumb-item"
                        active="active"
                    />
                </ol>
            </nav>
        @endif

        <div class="@hasSection('navbar') @else d-none d-md-block @endif bg-white layout v-md-center bg-top-bar-white">
            <header class="d-none d-md-block col-xs-12 col-md p-0">
                <h1 class="m-0 fw-light h3 text-black">@yield('title')</h1>
                <small class="text-muted" title="@yield('description')" style="display: none">@yield('description')</small>
            </header>
            <nav class="col-xs-12 col-md-auto ms-auto p-0">
                <ul class="nav command-bar justify-content-sm-end justify-content-start d-flex align-items-center">
                    @yield('navbar')
                </ul>
            </nav>
        </div>

        @include('platform::partials.alert')
        @yield('content')
    </div>
@endsection
