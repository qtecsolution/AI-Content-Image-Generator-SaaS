<form method="post" class="bg-warning p-2 border-lite" action="{{ route('use-case-category.update', $data->id) }}" id="save-form"
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
            <label for="is_published" class="form-label col-md-12"> Status : </label>
            {!! Form::select('is_published', [1=>'Active',2=>'Inactive'], $data->is_published, ['class'=>'nice-select']) !!}
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
