<x-layout>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Donatur Transaction List</h5>
                            </div>
                            {{-- <div class="col-md-6 text-end">
                                @if (!@empty($PermissionAdd))
                                    <a href="{{ url('panel/category/add') }}"
                                        class="btn btn-outline-primary mt-3">Add</a>
                                @endif
                            </div> --}}
                        </div>

                        <table class="table table-hover datatable">

                            <thead>
                                <tr>
                                    <th scope="col">Program</th>
                                    <th scope="col">OrderId</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanda Terima</th>
                                    {{-- @if (!@empty($PermissionEdit) || !@empty($PermissionDelete))
                                        <th scope="col">Action</th>
                                    @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($getRecord) && $getRecord->count() > 0)
                                    @foreach ($getRecord as $value)
                                        <tr>{{ $value }}
                                            <td>{{ $value->campaign_title }}</td>
                                            <td>{{ $value->order_id }}</td>
                                            <td>{{ $value->donor_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ number_format($value->gross_amount, 0, ',', '.') }}</td>
                                            <td>{{ $value->transaction_time }}</td>
                                            <td>
                                                @if ($value->transaction_status == 'pending')
                                                    <span class="btn btn-outline-warning btn-sm">Pending</span>
                                                @elseif ($value->transaction_status == 'settlement')
                                                    <span class="btn btn-outline-success btn-sm">Settlement</span>
                                                @endif
                                            </td>
                                            <td></td>
                                            {{-- <td>{{ $value->is_active == 1 ? 'Active' : 'Not Active' }}</td> --}}
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </section>
</x-layout>
