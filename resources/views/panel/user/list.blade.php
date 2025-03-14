<x-layout>

    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Administrator</a></li>
                {{-- <li class="breadcrumb-item">Tables</li> --}}
                <li class="breadcrumb-item active">User</li>
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
                                <h5 class="card-title">User List</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (!@empty($PermissionAdd))
                                    <a href="{{ url('panel/user/add') }}" class="btn btn-outline-primary mt-3">Add</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
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
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->role_name }}</td>
                                            <td>
                                                @if (!@empty($PermissionEdit))
                                                    <a href="{{ url('panel/user/edit/' . $value->id) }}"
                                                        class="btn btn-outline-success btn-sm">Edit</a>
                                                @endif
                                                @if (!@empty($PermissionDelete))
                                                    <a href="{{ url('panel/user/delete/' . $value->id) }}"
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


        </div>
    </section>

</x-layout>
