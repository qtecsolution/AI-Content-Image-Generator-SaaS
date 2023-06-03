<div class="card-body">
    <form action="{{ route('plan.purchase.store') }}" method="post" id="order_payment_done" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <input type="hidden" name="paymentMethod" value="bank">
        <input type="hidden" name="type" value="{{$type}}">
        <input type="hidden"  name="paymentAmount" value="{{ $price}}">
        <input type="hidden" name="coupon_id" value="{{$couponId??''}}">
        <input type="hidden" name="paymentTID" value="">
        <p class="mb-3">{{ readConfig('about_bank') }}</p>
        <ul class="list-group">
            <li class="list-group-item">Bank Name: {{ readConfig('bank_name') }}</li>
            <li class="list-group-item">Account Name: {{ readConfig('account_name') }}</li>

            <li class="list-group-item">Account Number: {{ readConfig('account_number') }}</li>
            <li class="list-group-item">Swift Code: {{ readConfig('swift_code') }}</li>
            <li class="list-group-item">Routing Number: {{ readConfig('routing_number') }}</li>
            <li class="list-group-item">Payable Amount: {{readConfig('currency_symbol')}}{{ $price}} </li>
        </ul>

        <div class="form-group mt-2 mb-2">
            <label class="control-label mb-2"> <b> Please upload the document: </b> </label>
            <input type="file" name="value_1" class="form-control" />
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
