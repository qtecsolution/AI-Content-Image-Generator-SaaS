<form method="post" class="bg-warning p-2 border-lite" action="{{ route('blog-category.update', $data->id) }}" id="save-form"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="pull-right">
            <i class="fa fa-pencil"></i>
       </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="name" class="form-label">Name : </label>
            <input type="text"
                class="form-control custom-input @error('name') is-invalid @enderror"
                id="name" required autocomplete="off" name="name"
                placeholder="Category Name" value="{{ $data->name }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="tags" class="form-label">Tags : </label>
            <input type="text"
                class="form-control custom-input @error('tags') is-invalid @enderror"
                id="tags" name="tags" placeholder="Tag separeted by comma"
                value="{{ $data->tags }}">
            <div class="form-text"> For seo (Optional) </div>
            <div class="invalid-feedback">
                Please enter some tags
            </div>
        </div>
    </div>

    <!-- description -->
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="meta_description" class="form-label"> Meta Description : </label>
            <textarea class="form-control custom-input @error('meta_description') is-invalid @enderror" id="meta_description" autocomplete="off"
                name="meta_description" placeholder="Meta Description" rows="4">{{ $data->meta_description}}</textarea>
            <div class="form-text"> For seo (Optional) </div>
            <div class="invalid-feedback">
                Please enter your description
            </div>
        </div>
    </div>
    <div class="generate-btn-wrapper">
        <button type="submit" class="generate-btn">Update</button>
    </div>
</form>
<script>
    window.setTimeout(() => {
        let form = document.getElementById('save-form');
        form.classList.remove('bg-warning');
        form.classList.add('bg-light');

    }, 500);
</script>
