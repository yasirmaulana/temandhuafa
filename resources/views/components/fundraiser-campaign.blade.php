<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')

            <div class="row">
                <div class="col-md-12 text-start">
                    <a href="{{ url('panel/fundraiser/campaign/add') }}" class="btn btn-outline-primary mt-3 border-0">Add Campaign</a>
                </div>
            </div>

            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Target Amount</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Fundraiser</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <th>{{ $value->title }}</th>
                            <td>{{ $value->category_name }}</td>
                            <td>{{ number_format($value->target_amount, 0, ',', '.') }}</td>
                            <td>{{ $value->end_date }}</td>
                            <td>{{ $value->fundraiser_name }}</td>
                            <td>{{ $value->status }}</td>
                            <td>
                                @if ($value->status == 'pending')
                                    <a href="{{ url('panel/campaign/approve/' . $value->id) }}"
                                        class="btn btn-outline-warning btn-sm">Approve</a>
                                @elseif($value->status == 'approved')
                                    <a href="{{ url('panel/campaign/complate/' . $value->id) }}"
                                        class="btn btn-outline-info btn-sm">Complate</a>
                                @else
                                @endif
                                    <a href="{{ url('panel/fundraiser/campaign/edit/' . $value->id) }}"
                                        class="btn btn-outline-success btn-sm">Update</a>
                                    <a href="{{ url('panel/fundraiser/campaign/delete/' . $value->id) }}"
                                        class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</section>
