<x-layout>

    <div class="pagetitle">
        <h1>Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Administrator</a></li>
                {{-- <li class="breadcrumb-item">Tables</li> --}}
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Role List</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (!@empty($PermissionAdd))
                                    <a href="{{ url('panel/role/add') }}" class="btn btn-outline-primary mt-3">Add</a>
                                @endif
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    @if (!@empty($PermissionEdit) || !@empty($PermissionDelete))
                                        <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            @if (!@empty($PermissionEdit))
                                                <a href="{{ url('panel/role/edit/' . $value->id) }}"
                                                    class="btn btn-outline-success btn-sm">Edit</a>
                                            @endif
                                            @if (!@empty($PermissionDelete))
                                                <a href="{{ url('panel/role/delete/' . $value->id) }}"
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
