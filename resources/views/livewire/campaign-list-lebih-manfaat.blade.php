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
    
    <div class="lembaga-slider slider">

        @foreach ($fundraisers as $fundraiser)
        <div class="card mb-1">
                <a href="{{ route('fundraiserDetail', ['slug' => $fundraiser->slug]) }}">
                    <img src="{{ asset('storage/' . $fundraiser->cover) }}" class="card-img-top" style="height:120px" alt="image">
                    <div class="card-body pt-2">
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