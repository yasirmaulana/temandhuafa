<div class="container">

    @livewire('header')

    <!-- appCapsule -->
    <div id="appCapsule">

    <!-- list campign terbaru -->
    <div class="section full mt-3 pb-2 mb-2">
      <h3 class="heading text mb-1 ml-2">Data Program</h3>

          <ul class="listview">
            @foreach ($campaigns as $campaign)
                <li style="width: 100%;">
                    <a href="{{ url('campaign/' . $campaign->slug) }}" wire:navigate style="display: block; width: 100%;">
                        <div class="row">
                            <div class="col-5">
                                <div class="mt-1 mb-1">
                                    <img src="{{ $campaign->image }}" alt="image" class="imaged w-100" style="height:120px">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="mt-1 mb-1">
                                    <h5 class="mb-1 text-primary" style="font-weight:bold">{{ $campaign->title }}</h5>
                                    <h6>{{ $campaign->fundraiser }}</h6>
                                    <div class="progress mt-1 mb-1" style="height:5px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ ($campaign->total_gross_amount/$campaign->target_amount)*100 }}%;"
                                            aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <h6 class="mb-0">Terkumpul</h6>
                                            <h5 style="font-weight:bold">Rp {{ number_format($campaign->total_gross_amount, 0, ',', '.') }}</h5>
                                        </div>
                                        <div class="col-4 margin-top">
                                            <h6 class="text-right mb-0">Sisa hari</h6>
                                            <h5 class="text-right" style="font-weight:bold">{{ floor(abs(\Carbon\Carbon::parse($campaign->end_date)->diffInDays(now()))) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

        </ul>
        </div>

        <!-- load more post -->
          {{-- <div class="section inset pt-2 pb-2">
            <a href="#" class="btn-block" id="loadMore">
              <button type="button" class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat Lagi</button>
            </a>
          </a>
          </div> --}}
        <!-- * load more post -->
    <!-- * list campign terbaru -->

    </div>
    <!-- * appCapsule -->

    @livewire('nav-bar')

  	<!-- Load More -->
    {{-- <script src="{{ asset('assets/js/plugins/loadMore.js') }}"></script> --}}
</div>