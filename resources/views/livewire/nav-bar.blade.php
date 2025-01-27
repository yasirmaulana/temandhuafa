<div>
    <div class="mobile-style-1 border p-3 bg-light">
        <ul>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="/" wire:navigate class="mobile-box">
                    <div class="mobile-icon">
                        <i class="bi bi-house-door ms-2"></i>
                    </div>
                    <div class="mobile-name">
                        <h5>BERANDA</h5>
                    </div>
                </a>
            </li>
            <li class="{{ request()->is('donasi') ? 'active' : '' }}">
                <a href="/donasi" wire:navigate class="mobile-box">
                    <div class="mobile-icon">
                        <i class="bi bi-wallet ms-2"></i>
                    </div>
                    <div class="mobile-name">
                        <h5>DONASI</h5>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" wire:navigate class="mobile-box">
                    <div class="mobile-icon">
                        <i class="bi bi-book ms-2"></i>
                    </div>
                    <div class="mobile-name">
                        <h5>ILMU</h5>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="#" wire:navigate class="mobile-box">
                    <div class="mobile-icon">
                        <i class="bi bi-person ms-2"></i>
                    </div>
                    <div class="mobile-name">
                        <h5>AKUN</h5>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
