<form method="post" class="bg-warning p-2 border-lite" action="{{ route('manage-faq.update', $data->id) }}"
    id="save-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-12">
        <div class="pull-right">
            <i class="fa fa-pencil"></i>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="question" class="form-label">Question : </label>
            <input type="text" class="form-control custom-input @error('question') is-invalid @enderror"
                id="question" required autocomplete="off" name="question" placeholder="Question ?"
                value="{{ $data->question }}">
            @error('question')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <!-- description -->
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="answear" class="form-label"> Answear : </label>
            <textarea class="form-control custom-input @error('answear') is-invalid @enderror" id="answear" autocomplete="off"
                name="answear" placeholder="Answear" rows="8">@purify($data->answear)</textarea>
            @error('answear')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="priority" class="form-label">Priority : </label>
            <input type="number" min="1"
                class="form-control custom-input @error('priority') is-invalid @enderror" id="priority" required
                autocomplete="off" name="priority" placeholder="Priority" value="{{ $data->priority }}">
            @error('priority')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="is_published" class="form-label col-md-12"> Status : </label>
            {!! Form::select('is_published', [1 => 'Active', 2 => 'Inactive'], $data->is_published, [
                'class' => 'nice-select',
            ]) !!}
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
