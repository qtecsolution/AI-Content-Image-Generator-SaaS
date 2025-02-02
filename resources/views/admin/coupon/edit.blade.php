<form method="post" class="bg-warning p-2 border-lite" action="{{ route('manage-coupon.update', $data->id) }}"
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
            <label for="name" class="form-label">Coupon Name<span class="text-danger">*</span> : </label>
            <input type="text"
                   class="form-control custom-input @error('name') is-invalid @enderror"
                   id="name" required autocomplete="off" name="name"
                   placeholder="" value="{{ $data->name }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="code" class="form-label">Coupon Code<span class="text-danger">*</span> : </label>
            <input type="text"
                   class="form-control custom-input @error('code') is-invalid @enderror"
                   id="code" required autocomplete="off" name="code"
                   placeholder="" value="{{ $data->code }}">
            @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="min_purchase" class="form-label">Minimum purchase amount<span class="text-danger">*</span> : </label>
                <input type="number" min="0"
                       class="form-control custom-input @error('min_purchase') is-invalid @enderror"
                       id="min_purchase" required autocomplete="off" name="min_purchase"
                       placeholder="" value="{{ $data->min_purchase }}">
                @error('min_purchase')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="max_discount" class="form-label">Maximum discount amount: </label>
                <input type="number" min="0"
                       class="form-control custom-input @error('max_discount') is-invalid @enderror"
                       id="max_discount" autocomplete="off" name="max_discount"
                       placeholder="" value="{{ $data->max_discount }}">
                @error('max_discount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="answer" class="form-label"> Discount type: </label>
                <div>
                    <label class="me-4"><input type="radio" name="type" value="1" @if($data->type==1) checked @endif > Amount </label>
                    <label><input type="radio" name="type" value="2" @if($data->type==2) checked @endif> Percent(%) </label>
                </div>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="discount_value" class="form-label">Discount Value<span class="text-danger">*</span> : </label>
                <input type="number" min="0"
                       class="form-control custom-input @error('discount_value') is-invalid @enderror"
                       id="discount_value" required autocomplete="off" name="discount_value"
                       placeholder="" value="{{ $data->discount_value }}">
                @error('discount_value')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="start_date" class="form-label">Start time<span class="text-danger">*</span> : </label>
                <input type="text"
                       class="form-control datepicker custom-input @error('start_date') is-invalid @enderror"
                       id="start_date" required autocomplete="off" name="start_date"
                       placeholder="" value="{{ date('d-m-Y',strtotime($data->start_date)) }}">
                @error('start_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="form-group">
                <label for="end_date" class="form-label">End time<span class="text-danger">*</span> : </label>
                <input type="text"
                       class="form-control datepicker custom-input @error('end_date') is-invalid @enderror"
                       id="end_date" required autocomplete="off" name="end_date"
                       placeholder="" value="{{ date('d-m-Y',strtotime($data->end_date)) }}">
                @error('end_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12 mb-3 min-height-70">
        <div class="form-group">
            <label for="is_published" class="form-label"> Specific user only: </label>
            {!! Form::select('user_id', $users, $data->user_id ?? '', ['class' => 'w-100 nice-select','placeholder'=>'Select a user','searchable'=>'true']) !!}
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

<script type="text/javascript">
   $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
    });
    if (typeof niceSelectInstance === 'undefined') {
        let niceSelectInstance = document.querySelectorAll('.nice-select')
        niceSelectInstance.forEach(niceSelectItem => {
            NiceSelect.bind(niceSelectItem, {
                searchable: niceSelectItem.getAttribute("searchable") || false,
                placeholder: niceSelectItem.getAttribute("data-placeholder")
            });
        })
    }
    

    window.setTimeout(() => {
        let form = document.getElementById('save-form');
        form.classList.remove('bg-warning');

    }, 500);
</script>