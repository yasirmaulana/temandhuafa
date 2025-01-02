<x-layout>

    <div class="pagetitle">
        <h1>Form New Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Administrator</a></li>
                <li class="breadcrumb-item">Role</li>
                <li class="breadcrumb-item active">Add New Role</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12   ">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Role</h5>

                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label mb-3"><b>Permission</b></label>

                                @foreach ($getPermission as $value)
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            {{ $value['name'] }}
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                @foreach ($value['group'] as $group)
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="checkbox" value="{{ $group['id'] }}"
                                                                name="permission_id[]">
                                                            {{ $group['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layout>
