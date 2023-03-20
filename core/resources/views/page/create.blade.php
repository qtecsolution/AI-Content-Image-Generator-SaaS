<div class="card-body">
    <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-2">
            <label>@translate(Page Title) <span class="text-danger">*</span></label>
            <input class="form-control custom-input" placeholder="@translate(Page Title)" type="text"  name="title" required>
        </div>

        <div class="form-group mb-2">
            <label>@translate(Meta Title)</label>
            <input class="form-control custom-input" name="meta_title" type="text" max="100" placeholder="@translate(Meth Title)">
        </div>

        <div class="form-group mb-2">
            <label>@translate(Meta Keywords)</label>
            <input class="form-control custom-input" name="meta_keys" type="text" max="100" placeholder="@translate(Meth Keys)">
        </div>

        <div class="form-group mb-2">
            <label>@translate(Meta Description)</label>
            <textarea class="form-control custom-input" name="meta_desc" maxlength="200" placeholder="@translate(Meta Description write)"></textarea>
        </div>
        

        <div class="float-right">
            <button class="btn btn-primary px-5 radius-30" type="submit">@translate(Save)</button>
        </div>

    </form>
</div>





