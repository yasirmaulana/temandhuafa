<x-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Slider List</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (!@empty($PermissionAdd))
                                    <a href="{{ url('panel/slider/add') }}" class="btn btn-outline-primary mt-3">Add</a>
                                @endif
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Link</th>
                                    @if (!@empty($PermissionEdit) || !@empty($PermissionDelete))
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <td>
                                            <img src="{{ $value->image }}" alt="" class="img-thumbnail"
                                                style="width: 100px; height: 50px;">
                                        </td>
                                        <td>{{ $value->link }}</td>
                                        <td>
                                            @if (!@empty($PermissionEdit))
                                                <a href="{{ url('panel/slider/edit/' . $value->id) }}"
                                                    class="btn btn-outline-success btn-sm">Update</a>
                                            @endif
                                            @if (!@empty($PermissionDelete))
                                                <a href="{{ url('panel/slider/delete/' . $value->id) }}"
                                                    class="btn btn-outline-danger btn-sm">Delete</a>
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
    </section>
</x-layout>
