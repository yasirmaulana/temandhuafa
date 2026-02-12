<div class="section full mb-3">
    <div class="row">
        <div class="col-8">
            <h3 class="heading ml-2">Lebih Dekat Lebih Manfaat</h3>
        </div>
        <div class="col-4 text-right pr-3">
            <a href="">
                <h6 class="text-primary">Lihat Semua</h6>
            </a>
        </div>
    </div>
    
    <style>
        .scrolling-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            gap: 16px;
            padding-bottom: 10px;
            scroll-snap-type: x mandatory;
            width: 100%;
        }
        .scrolling-wrapper .card-scroll-item {
            flex: 0 0 85%;
            scroll-snap-align: center;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .scrolling-wrapper::-webkit-scrollbar {
            display: none;
        }
        /* Desktop */
        @media (min-width: 768px) {
            .scrolling-wrapper .card-scroll-item {
                flex: 0 0 320px;
            }
        }
        /* Typography refinements */
        .card-body h5.text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <div class="scrolling-wrapper">
        @foreach ($fundraisers as $fundraiser)
        <div class="card mb-1 card-scroll-item">
            <a href="{{ $fundraiser->slug ? route('fundraiserDetail', ['slug' => $fundraiser->slug]) : '#' }}" class="text-decoration-none">
                <img src="{{ asset('storage/' . $fundraiser->cover) }}" class="card-img-top" style="height:140px; object-fit: cover;" alt="image">
                <div class="card-body pt-2 pb-2">
                    <h6 class="mb-0 text-secondary">{{ $fundraiser->kota_domisili }}</h6>
                    <h5 class="text-primary" style="font-weight:bold">{{ $fundraiser->nama_lembaga }}</h5>
                    <h6 class="mb-0 text-secondary">Total Penghimpunan</h6>
                    <h5>Rp {{ number_format($fundraiser->total_gross_amount, 0, ',', '.') }}</h5>
                    <h6 class="mb-0 text-secondary">Total Penerima Manfaat</h6>
                    <h5 class="mb-0">0</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>