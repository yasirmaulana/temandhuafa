<div>
    <!-- App Header -->
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" class="headerButton">
                <img src="{{ asset('assets/img/logo.png') }}"></img>
            </a>
        </div>
        <div class="pageTitle"></div>
        {{-- <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div> --}}
    </div>
    <!-- * App Header -->

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
