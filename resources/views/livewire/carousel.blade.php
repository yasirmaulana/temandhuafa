<div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliderCarousel as $slider)
            <div class="carousel-item active">
                <a href="{{ $slider->link }}" wire:navigate>
                    <img src="{{ $slider->image }}" class="d-block w-100">
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
        </span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
