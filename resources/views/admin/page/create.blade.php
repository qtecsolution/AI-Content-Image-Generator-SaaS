<div class="card-body">
    <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label  class="form-label">@translate(Page Title) <span class="text-danger">*</span></label>
            <input class="form-control custom-input" placeholder="@translate(Page Title)" type="text"  name="title" required>
        </div>

        {{-- <div class="form-group mb-3">
            <label class="form-label">@translate(Meta Title)</label>
            <input class="form-control custom-input" name="meta_title" type="text" max="100" placeholder="@translate(Meth Title)">
        </div> --}}

        <div class="form-group mb-3">
            <label class="form-label">@translate(Keywords)</label>
            <input class="form-control custom-input" name="meta_keys" type="text" max="100" placeholder="@translate(Meta Keywords)">
        </div>

        <div class="form-group mb-3">
            <label class="form-label">@translate(Meta Description)</label>
            <textarea class="form-control custom-input" name="meta_desc" maxlength="200" placeholder="@translate(Meta Description write)"></textarea>
        </div>



        <div class="generate-btn-wrapper">
            <button type="submit" class="generate-btn px-4">@translate(Create)</button>
         </div>

    </form>
</div>





