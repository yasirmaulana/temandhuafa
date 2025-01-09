<x-layout>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Donatur List</h5>
                            </div>
                            {{-- <div class="col-md-6 text-end">
                                @if (!@empty($PermissionAdd))
                                    <a href="{{ url('panel/donatur/add') }}" class="btn btn-outline-primary mt-3">Add</a>
                                @endif
                            </div> --}}
                        </div>

                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Handphone</th>
                                    <th scope="col">Donation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th>{{ $value->name }}</th>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->handphone }}</td>
                                        <td>{{ number_format($value->target_amount, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </section>


</x-layout>
