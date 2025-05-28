<x-layout>

    <section class="section">
        <div class="row">
            <div class="col-lg-12   ">

                <div class="card">
                    <div class="card-body">
                        @if (Auth::user()->role_id == 1 && $getRecord->status == 'draft')
                            <h5 class="card-title">Publish Campaign</h5>
                        @else
                            <h5 class="card-title">Update Campaign</h5>
                        @endif

                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Image</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            @if ($getRecord->image)
                                <div class="my-3">
                                    <p>Current Image:</p>
                                    <img src="{{ $getRecord->image }}" alt="Image Preview"
                                        style="width: 50%; object-fit: cover;">
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Title</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $getRecord->title }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Category</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="category_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getCategories as $value)
                                            <option {{ $getRecord->category_id == $value->id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Target Amount</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="target_amount"
                                        value="{{ $getRecord->target_amount }}" required>
                                </div>
                                <div class="text-danger">{{ $errors->first('target_amount') }}</div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">End Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" value="{{ $getRecord->end_date }}"
                                        name="end_date" required>
                                </div>
                            </div>

                            <label for="inputText" class="col-sm-12 col-form-label">Description</label>
                            <textarea class="tinymce-editor" name="description">
                                {{ $getRecord->description }}
                            </textarea>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-12">
                                    @if (Auth::user()->role_id == 1 && $getRecord->status == 'draft')
                                        <button type="submit" class="btn btn-warning">Publish</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    @endif
                                    <a href="{{ url('panel/campaign') }}" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layout>