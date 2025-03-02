<div class="appBottomMenu container">
    <a href="/" wire:navigate class="item {{ request()->is('/') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home"></ion-icon>
            <strong>BERANDA</strong>
        </div>
    </a>
    <a href="/program" wire:navigate class="item {{ request()->is('/program') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="layers-outline"></ion-icon>
            <strong>PROGRAM</strong>
        </div>
    </a>
    <a href="/faq" class="item {{ request()->is('/faq') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="book-outline"></ion-icon>
            <strong>FAQ</strong>
        </div>
    </a>
    <a href="/akun" class="item {{ request()->is('/akun') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="person-outline"></ion-icon>
            <STRONG>AKUN</STRONG>
        </div>
    </a>
</div>
