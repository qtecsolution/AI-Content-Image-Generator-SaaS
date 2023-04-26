<form action="{{ route('plan.purchase.store') }}" enctype="multipart/form-data" method="post" id="order_payment_done"
    class="mt-4">
    @csrf


    {{-- this is single form --}}
    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
    <input type="hidden" id="paymentMethod" name="paymentMethod" value="">
    <input type="hidden" id="paymentAmount" name="paymentAmount" value="{{ $plan->price }}">
    <input type="hidden" id="paymentTID" name="paymentTID" value="">
    <input type="hidden" id="value_1" name="value_1" value="">

    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ readConfig('RAZORPAY_KEY') }}"
        data-amount="{{ 100 * $plan->price }}" data-name="{{ readConfig('type_name') }}" data-description=""
        data-image="{{ filePath(readConfig('logo')) }}" data-prefill.name="{{ $user->name }}"
        data-prefill.email="{{ $user->email }}"></script>


    <div class="form-group">
        <label for="name" class="form-label">Name
        </label>
        <input type="text" value="{{ $user->name }}" class="form-control custom-input shadow-none" id="name"
            name="name" autocomplete="off" placeholder="Enter your name">
        <div class="valid-feedback">
            Awesome! You're one step closer to greatness.
        </div>
        <div class="invalid-feedback">
            Please enter your name
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong> Please enter your name </strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone" class="form-label">Email
        </label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control custom-input shadow-none"
            id="phone" autocomplete="off" placeholder="Enter your phone">
        <div class="valid-feedback">
            Awesome! You're one step closer to greatness.
        </div>
        <div class="invalid-feedback">
            Please enter your email
        </div>


    </div>

    <div class="form-group">
        <label for="address" class="form-label">Address </label>
        <input type="text" value="{{ $user->address }}" class="form-control custom-input shadow-none" name="address"
            id="address" autocomplete="off" placeholder="Enter your address">
        <div class="valid-feedback">
            Awesome! You're one step closer to greatness.
        </div>
        <div class="invalid-feedback">
            Please enter your address
        </div>


    </div>




    <div class="form-group">
        <label for="phone" class="form-label">Phone
        </label>
        <input type="tel" class="form-control custom-input shadow-none" id="phone" autocomplete="off"
            placeholder="Enter your phone" name="phone" value="{{ $user->phone }}">
        <div class="valid-feedback">
            Awesome! You're one step closer to greatness.
        </div>
        <div class="invalid-feedback">
            Please enter your Phone
        </div>

    </div>
</form>
