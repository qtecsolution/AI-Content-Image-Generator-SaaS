<div class="card-body">
    <form action="{{ route('pages.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $page->id }}">
        <div class="form-group mb-3">
            <label class="form-label">@translate(Page Title) <span class="text-danger">*</span></label>
            <input class="form-control custom-input" type="text" name="title" value="{{$page->title}}" required>
        </div>


        {{-- <div class="form-group mb-3">
            <label class="form-label">@translate(Meta Title)</label>
            <input class="form-control custom-input" name="meta_title" value="{{$page->meta_title}}" type="text" max="100" placeholder="@translate(Meth Title)">
        </div> --}}

        <div class="form-group mb-3">
            <label class="form-label">@translate(Keywords)</label>
            <input class="form-control custom-input" name="meta_keys" value="{{$page->meta_keys}}" type="text" max="100" placeholder="@translate(Meta Keywords)">

        </div>

        <div class="form-group mb-3">
            <label class="form-label">@translate(Meta Description)</label>
            <textarea class="form-control custom-input" name="meta_desc" maxlength="200" placeholder="@translate(Meta Description write)">@purify($page->meta_desc)</textarea>
           
        </div>
       


        <div class="float-right">
            <button class="generate-btn px-4" type="submit">@translate(Save)</button>
        </div>

    </form>
</div>
