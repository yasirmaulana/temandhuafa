<x-layout>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="col-md-12 text-end mb-3">
                    {{-- @if (!@empty($PermissionAdd)) --}}
                        <a href="{{ url('panel/campaignreport/add') }}" class="btn btn-primary mt-3">Add Report</a>
                    {{-- @endif --}}
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Campaign Report: {{ $campaignTitle }}</h5>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penerima Manfaat</th>
                                        <th scope="col">Lokasi Penyaluran</th>
                                        <th scope="col">Deskripsi</th>
                                        @if (!@empty($PermissionEdit) || !@empty($PermissionDelete))
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <th>{{ $value->tgl_laporan }}</th>
                                            <td>{{ $value->gambar }}</td>
                                            <td>{{ $value->judul }}</td>
                                            <td>{{ $value->penerima_manfaat }}</td>
                                            <td>{{ $value->lokasi_penyaluran }}</td>
                                            <td>{{ $value->deskripsi }}</td>
                                            <td>
                                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                                    <a href="{{ url('panel/campaignreport/edit/' . $value->id) }}"
                                                        class="btn btn-outline-success btn-sm ">Edit</a>
                                                {{-- <a href="{{ url('panel/campaign/delete/' . $value->id) }}"
                                                    class="btn btn-outline-danger btn-sm">Delete</a> --}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>

</x-layout>
