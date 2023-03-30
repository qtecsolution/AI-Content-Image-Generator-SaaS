<div class="card-body">
    <form action="{{ route('plan.purchase.store') }}" method="post" id="order_payment_done" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <input type="hidden" id="paymentMethod" name="paymentMethod" value="bank">
        <input type="hidden" id="paymentAmount" name="paymentAmount" value="{{ $plan->price }}">
        <input type="hidden" id="paymentTID" name="paymentTID" value="">
        <input type="hidden" id="value_1" name="value_1" value="">
    </form>

    <div id="smart-button-container">
        <div class="text-center">
            <div id="paypal-button-container"></div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id={{ readConfig('PAYPAL_CLIENT_ID') }}&enable-funding=venmo&currency=USD"
    data-sdk-integration-source="button-factory"></script>

<script>
    "use strict"

    function initPayPalButton() {
        //get amount

        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'black',
                layout: 'vertical',
                label: 'checkout',
                tagline: false
            },

            createOrder: function(data, actions) {

                return actions.order.create({
                    purchase_units: [{
                        "amount": {
                            "currency_code": "USD",
                            "value": {{ $plan->price }}
                        }
                    }]
                });

            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    var data = JSON.stringify(orderData, null, 2);

                    console.log('Capture result' + data['purchase_units']['amount']['value'] + ' ' +
                        data['id']);
                    //append the data
                    $('#paymentMethod').val('paypal');
                    $('#paymentAmount').val(data['purchase_units']['amount']['value']);
                    $('#paymentTID').val(data['id']);
                    $('#value_1').val(data);
                    $('#order_payment_done').submit();



                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err) {

                if ($('input[type="radio"][name="shipping_method"]').is(":checked")) {
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML =
                        '<h3>Transaction is failed, please Place order as partial payment !</h3>';
                    console.log('error = ' + err);
                }

            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>
