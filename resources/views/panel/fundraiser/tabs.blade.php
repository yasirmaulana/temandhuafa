<x-layout>

    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title"></h5> --}}
                <ul class="nav nav-tabs pt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="identity-tab" data-bs-toggle="tab" data-bs-target="#identity"
                            type="button" role="tab" aria-controls="identity"
                            aria-selected="true">Register</button>
                    </li>
                    @if (Auth::user()->role_id == 3)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="campaign-tab" data-bs-toggle="tab" data-bs-target="#campaign"
                                type="button" role="tab" aria-controls="campaign"
                                aria-selected="false">Campaign</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="report-tab" data-bs-toggle="tab" data-bs-target="#report"
                                type="button" role="tab" aria-controls="report"
                                aria-selected="false">Report</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="disbursment-tab" data-bs-toggle="tab"
                                data-bs-target="#disbursment" type="button" role="tab" aria-controls="disbursment"
                                aria-selected="false">Disbursment</button>
                        </li>
                    @endif
                </ul>
                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="identity" role="tabpanel"
                        aria-labelledby="identity-tab">

                        {{-- user role-donatur, sudah melakukan registrasi --}}
                        @if (Auth::user()->role_id = 2 && $getRecord->count() > 0)
                            <x-forms.fundraiser-registered />
                        {{-- user role-donatur, belum melakukan registrasi --}}
                        @elseif (Auth::user()->role_id = 2)
                            <x-forms.fundraiser-register />
                        @endif

                    </div>
                    @if (Auth::user()->role_id == 3)
                        <div class="tab-pane fade" id="campaign" role="tabpanel" aria-labelledby="campaign-tab">
                            Campaign
                        </div>
                        <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                            Report
                        </div>
                        <div class="tab-pane fade" id="disbursment" role="tabpanel" aria-labelledby="disbursment-tab">
                            Disbursment
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @endif

</x-layout>
