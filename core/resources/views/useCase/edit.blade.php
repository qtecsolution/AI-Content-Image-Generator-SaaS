<form method="post" class="bg-warning p-2 border-lite" action="{{ route('use-case.update', $data->id) }}" id="save-form"
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
            <label for="title" class="form-label">Use Case : </label>
            <input type="text" class="form-control custom-input @error('title') is-invalid @enderror" id="title"
                required autocomplete="off" name="title" placeholder="Use Case" value="{{ $data->title }}">
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
            <div class="invalid-feedback">
                Please enter a title
            </div>
        </div>
    </div>

    <!-- description -->
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="details" class="form-label">Details : </label>
            <textarea class="form-control custom-input @error('details') is-invalid @enderror" id="details" autocomplete="off"
                name="details" placeholder="Details" rows="4">@purify($data->details)</textarea>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
            <div class="invalid-feedback">
                Please enter your description
            </div>
        </div>
    </div>
    <!-- Input Fields  -->
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="details" class="form-label"> Input Fields : </label>
            <div>
                @php 
                    $inputFields = explode(',',$data->input_fields);
                @endphp
                <label> <input class="input_fields" type="checkbox" value="1" name="input_fields[]" @if(in_array(1,$inputFields)) checked @endif > Title </label>
                <label  class="mx-4"> <input class="input_fields" type="checkbox" value="2" name="input_fields[]" @if(in_array(2,$inputFields)) checked @endif> Keywords </label>
                <label> <input class="input_fields" type="checkbox" value="3" name="input_fields[]" @if(in_array(3,$inputFields)) checked @endif> Description </label>
            </div>
            @error('input_fields')
            <div class="text-danger">
                At least select one input field!
            </div>
            @enderror
            <div id="input_fields_check" class="text-danger" style="display: none">
                At least select one input field!
            </div>
        </div>
    </div>
    <!-- Promt -->
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="promt-body" class="form-label">Open AI Resuest Prompt : </label>
            <textarea class="form-control custom-input @error('prompt') is-invalid @enderror" id="promt-body" autocomplete="off"
                name="prompt" placeholder="Prompt" rows="6">@purify( $data->prompt ?? 'Write me content with this keywords: [keywords]. The title is "[title]" and the description: [description]')</textarea>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
            <div class="invalid-feedback">
                Please enter your prompt
            </div>
            <div class="col-md-12">
                <span class="placeholder-text" data="promt-body">[keywords]</span>
                <span class="placeholder-text" data="promt-body">[title]</span>
                <span class="placeholder-text" data="promt-body">[description]</span>
                <br>
            </div>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="icon" class="form-label">Icon : </label>

            @if ($data->icon != '' && file_exists($data->icon))
                <div class="mb-1">
                    <img src="{{ asset($data->icon) }}" alt="Icon" style="max-height:30px">
                </div>
            @endif
            <input type="file" class="form-control custom-input @error('icon') is-invalid @enderror" id="icon"
                autocomplete="off" name="icon" onchange="imageCheck(this)">
            <span class="text-danger" id="fileNotSupported" style="display: none"> File not
                supported!</span>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
            <div class="invalid-feedback">
                Please enter a title
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
