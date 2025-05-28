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
        {{-- <div class="right">
            <a href="#" class="headerButton toggle-searchbox" aria-label="Search">
                <img src="{{ asset('assets/img/search-outline.svg') }}" alt="Search Icon" class="search-icon" height="24">
            </a>
        </div> --}}
    </div>
    
    <!-- Search Component -->
    <div id="search" class="appHeader container">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Cari...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

</div>
