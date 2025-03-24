@php
    $currentRoute = request()->path();
@endphp

<div class="appBottomMenu container">
    <a href="/" wire:navigate class="item {{ $currentRoute === '/' ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="{{ $currentRoute === '/' ? 'home' : 'home-outline' }}"></ion-icon>
            <strong>BERANDA</strong>
        </div>
    </a>
    <a href="/program/all" wire:navigate class="item {{ Str::startsWith($currentRoute, 'program/') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="{{ Str::startsWith($currentRoute, 'program/') ? 'layers' : 'layers-outline' }}"></ion-icon>
            <strong>PROGRAM</strong>
        </div>
    </a>
    <a href="/faq" wire:navigate class="item {{ $currentRoute === 'faq' ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="{{ $currentRoute === 'faq' ? 'book' : 'book-outline' }}"></ion-icon>
            <strong>FAQ</strong>
        </div>
    </a>
    <a href="/akun/dashboard-donatur" wire:navigate class="item {{ Str::startsWith($currentRoute, 'akun/') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="{{ Str::startsWith($currentRoute, 'akun/') ? 'person' : 'person-outline' }}"></ion-icon>
            <strong>AKUN</strong>
        </div>
    </a>
</div>
