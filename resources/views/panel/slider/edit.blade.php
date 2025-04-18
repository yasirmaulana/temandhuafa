<x-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-12   ">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Slider</h5>

                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Gambar</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            @if ($getRecord->image)
                                <div class="my-3">
                                    <p>Current Image:</p>
                                    <img src="{{ $getRecord->image }}" alt="Image Preview"
                                        style="width: 40%; object-fit: cover;">
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Link</label>
                                <div class="col-sm-12">
                                    <input type="text" value="{{ $getRecord->link }}" class="form-control"
                                        name="link" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ url('panel/slider') }}" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layout>
