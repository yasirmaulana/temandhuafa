<div>
    <style>
        .search-icon {
            filter: invert(1);
        }
    </style>
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton">
                <img src="{{ asset('assets/img/logo.png') }}"></img>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="#" class="headerButton toggle-searchbox" aria-label="Search">
                <img src="{{ asset('assets/img/search-outline.svg') }}" alt="Search Icon" class="search-icon" height="24">
            </a>
        </div>
    </div>

</div>
