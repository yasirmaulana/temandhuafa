<x-layout>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="col-md-12 text-end mb-3">
                    @if (!@empty($PermissionAdd))
                        <a href="{{ url('panel/campaign/add') }}" class="btn btn-primary mt-3">Add Campaign</a>
                    @endif
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Campaign List</h5>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Target Amount</th>
                                        <th scope="col">End Date</th>
                                        @if (Auth::user()->role_id == 1)
                                            <th scope="col">Fundraiser</th>
                                        @endif
                                        <th scope="col">Status</th>
                                        @if (!@empty($PermissionEdit) || !@empty($PermissionDelete))
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <th>{{ $value->title }}</th>
                                            <td>{{ $value->category_name }}</td>
                                            <td>{{ number_format($value->target_amount, 0, ',', '.') }}</td>
                                            <td>{{ $value->end_date }}</td>
                                            @if (Auth::user()->role_id == 1)
                                                <td>{{ $value->fundraiser }}</td>
                                            @endif
                                            <td>{{ $value->status }}</td>
                                            <td>
                                                @if (Auth::user()->role_id == 1)
                                                    <a href="{{ url('panel/campaign/edit/' . $value->id) }}"
                                                        class="btn btn-outline-success btn-sm ">Edit</a>
                                                @else
                                                    <a href="{{ url('panel/campaign/edit/' . $value->id) }}"
                                                        class="btn btn-outline-success btn-sm {{ $value->status == 'published' ? 'disabled' : '' }}"
                                                        style="{{ $value->status == 'published' ? 'pointer-events: none; opacity: 0.5;' : '' }}">Edit</a>
                                                @endif
                                                @if ($value->status == 'draft' && Auth::user()->role_id == 1)
                                                    {{-- <a href="{{ url('panel/campaign/approve/' . $value->id) }}" --}}
                                                    <a href="{{ url('panel/campaign/edit/' . $value->id) }}"
                                                        class="btn btn-outline-warning btn-sm">Publish</a>
                                                @endif
                                                @if ($value->status == 'published' && Auth::user()->role_id == 1)
                                                    <a href="{{ url('panel/campaign/complate/' . $value->id) }}"
                                                        class="btn btn-outline-info btn-sm">Complate</a>
                                                @endif
                                                {{-- @if (!@empty($PermissionDelete))
                                                <a href="{{ url('panel/campaign/delete/' . $value->id) }}"
                                                    class="btn btn-outline-danger btn-sm">Delete</a>
                                                @endif --}}
                                                <a href="{{ url('panel/campaignreport/' . $value->id . '/' . $value->title) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    Report</a>
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
