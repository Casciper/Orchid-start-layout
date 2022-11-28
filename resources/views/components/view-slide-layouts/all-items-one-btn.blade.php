<div class="text-left item bg-img" data-overlay-dark="3" data-background="{{ $slide->image }}">
    <img class="slider-bg" src="{{ $slide->image }}" alt="">
    <div class="slider-content">
        <h1 class="title">{{ $slide->content['title'] }}</h1>
        <p class="sub-title">{{ $slide->content['description'] }}</p>
        <div class="btns-container">
            <a href="#form-container" class="left-btn">{{ $slide->content['first_btn'] }}</a>
        </div>
    </div>
</div>
