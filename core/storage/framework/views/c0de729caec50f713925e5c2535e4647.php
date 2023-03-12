<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Checkout</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content p-2 p-md-4 pt-0">

        <section class="checkout">

            <div class="popular-template-header pt-4">
                <h4 class="header-title">Checkout</h4>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>


            <div class="row m-n2">
                <div class="col-12 col-lg-8 p-2">

                    <div class="card border-0 shadow-sm mb-3 px-3 overflow-hidden ">

                        <div class="card-header px-3">
                            <div class="font-weight-medium py-1">Payment method</div>
                        </div>

                        <div class="card-body p-0 ">

                            <ul class="list-group list-group-flush">
                                <?php if(readConfig('PAYPAL_ACTIVE') == 'on'): ?>
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="paypal" class="customradio-box"
                                                name="payment_processor" value="paypal" hidden="">
                                            <label for="paypal" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="<?php echo e(asset('assets/images/paypal.svg')); ?>"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Paypal</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Paypal payment</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if(readConfig('STRIPE_ACTIVE') == 'on'): ?>
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="stripe" class="customradio-box"
                                                name="payment_processor" value="stripe" hidden="">
                                            <label data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                aria-expanded="false" aria-controls="collapseExample" for="stripe"
                                                class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="<?php echo e(asset('assets/images/stripe.svg')); ?>"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Stripe</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Credit card</div>
                                                    </div>

                                                </div>
                                            </label>
                                            <div class="collapse" id="collapseExample">
                                                <div class="card-body">
                                                    <div class='row'>
                                                        <div class='col-xs-12 col-md-4  form-group'>
                                                            <label class='control-label'>Card Number</label>
                                                            <input autocomplete='off'
                                                                class='form-control custom-input card-number' size='20'
                                                                type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group cvc required'>
                                                            <label class='control-label'>CVC</label> <input
                                                                autocomplete='off'
                                                                class='form-control custom-input card-cvc'
                                                                placeholder='ex. 311' size='4' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group expiration required'>
                                                            <label class='control-label'>Expiration Month</label>
                                                            <input class='form-control custom-input card-expiry-month'
                                                                placeholder='MM' size='2' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group expiration required'>
                                                            <label class='control-label'>Expiration Year</label>
                                                            <input class='form-control custom-input card-expiry-year'
                                                                placeholder='YYYY' size='4' type='text'>
                                                        </div>
                                                    </div>
                                                    <div class='row '>
                                                        <div class='col-md-12 error form-group d-none'>
                                                            <div class='alert-danger alert'>Please correct the
                                                                errors and
                                                                try
                                                                again.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if(readConfig('RAZORPAY_ACTIVE') == 'on'): ?>
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="coinbase" class="customradio-box"
                                                name="payment_processor" value="razorpay" hidden="">
                                            <label for="coinbase" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="<?php echo e(asset('assets/images/razorpay_logo.png')); ?>"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Razorpay </span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Razorpay</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                <?php endif; ?>

                                <?php if(readConfig('bank_status') == 'on'): ?>
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="bank" class="customradio-box"
                                                name="payment_processor" value="bank" hidden="">
                                            <label for="bank" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="https://phpcontent.lunatio.com/img/icons/payments/bank.svg"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Bank</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Bank Transfar</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>


                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header">
                            <div class="font-weight-medium py-1">Billing information</div>
                        </div>
                        <div class="card-body d-flex flex-column gap-3 form-methods">
                            <form action="<?php echo e(route('plan.purchase.store')); ?>" enctype="multipart/form-data"
                                method="post" id="order_payment_done" class="mt-4">

                                <?php echo csrf_field(); ?>

                                
                                
                                <input type="hidden" id="plan_id" name="plan_id" value="<?php echo e($plan->id); ?>">
                                <input type="hidden" id="paymentMethod" name="paymentMethod" value="">
                                <input type="hidden" id="paymentAmount" name="paymentAmount"
                                    value="<?php echo e($plan->price); ?>">
                                <input type="hidden" id="paymentTID" name="paymentTID" value="">
                                <input type="hidden" id="value_1" name="value_1" value="">

                                <div class="form-group">
                                    <label for="name" class="form-label">Name
                                    </label>
                                    <input type="text" value="<?php echo e($user->name); ?>"
                                        class="form-control custom-input shadow-none" id="name" name="name"
                                        autocomplete="off" placeholder="Enter your name">
                                    <div class="valid-feedback">
                                        Awesome! You're one step closer to greatness.
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter your name
                                    </div>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong> Please enter your name </strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">Email
                                    </label>
                                    <input type="email" name="email" value="<?php echo e($user->email); ?>"
                                        class="form-control custom-input shadow-none" id="phone" autocomplete="off"
                                        placeholder="Enter your phone">
                                    <div class="valid-feedback">
                                        Awesome! You're one step closer to greatness.
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter your email
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="address" class="form-label">Address </label>
                                    <input type="text" value="<?php echo e($user->address); ?>"
                                        class="form-control custom-input shadow-none" name="address" id="address"
                                        autocomplete="off" placeholder="Enter your address">
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
                                    <input type="tel" class="form-control custom-input shadow-none" id="phone"
                                        autocomplete="off" placeholder="Enter your phone" name="phone"
                                        value="<?php echo e($user->phone); ?>">
                                    <div class="valid-feedback">
                                        Awesome! You're one step closer to greatness.
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter your Phone
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-4 p-2 d-flex flex-column justify-content-start">
                    <div class="card border-0 shadow-sm">

                        <div class="card-header">
                            <div class="font-weight-medium py-1">Order summary</div>
                        </div>

                        <div class="card-body p-0 mt-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item pt-0 py-3">
                                    <div class="row">
                                        <div class="col">
                                            <div><?php echo e($plan->name); ?></div>

                                            <div class="checkout-month d-inline-block">
                                                <div class="small text-muted">
                                                    <span class="checkout-subscription d-block">Billed
                                                        For 30 Days.</span>
                                                    <span class="d-none checkout-one-time">Billed
                                                        once.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class=" checkout-month d-inline-block">
                                                <?php echo e($plan->price); ?> <span
                                                    class="text-muted"><?php echo e(readConfig('currency_sambol')); ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>

                        <div class="card-footer font-weight-bold">
                            <div class="row">
                                <div class="col">
                                    <span>Total</span>
                                </div>
                                <div class="col-auto">
                                    <span class=" checkout-month d-inline-block">
                                        <?php echo e($plan->price); ?>

                                    </span>

                                    <span><?php echo e(readConfig('currency_sambol')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 px-2">
                        <span class="small text-muted">
                            <span class="checkout-subscription d-block">
                                By continuing, you agree with the terms
                                of service</a> and authorize <strong>phpContent</strong> to charge your
                                payment method on a recurring basis. You can cancel your subscription at any
                                time.
                            </span>
                            <span class="checkout-one-time d-none">
                                By continuing, you agree with the terms
                                of service</a>.
                            </span>
                        </span>
                    </div>

                    <div class="px-2">
                        <button type="button" onclick="checkOut()" name="submit"
                            class="btn btn-success btn-block my-3 w-100">
                            <span class=" checkout-month d-inline-block">
                                Pay <?php echo e($plan->price); ?> <?php echo e(readConfig('currency_sambol')); ?>

                            </span>

                        </button>
                    </div>

                    <span class="invalid-feedback methodError alert alert-danger" role="alert">
                        <strong>Please select the payment methods</strong>
                    </span>

                </div>
            </div>
        </section>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function checkOut() {

            var methods = 'others'
            methods = $('input[name=payment_processor]:checked').val();

            $('.methodError').addClass('invalid-feedback ')

            switch (methods) {
                case 'paypal':
                    paypalPayment();
                    break;
                case 'stripe':
                    $('.form-methods').load('<?php echo e(route('plan.stripe.load', $plan->id)); ?>');
                    stripPaymnet();
                    break;
                case 'razorpay':
                    // $('.form-methods').load('<?php echo e(route('plan.razorpay.load', $plan->id)); ?>');
                    razorPaymnet();
                    break;
                case 'bank':
                    bankPayment()
                    break;
                case 4:
                    day = "Thursday";
                    break;
                case 5:
                    day = "Friday";
                    break;
                case 6:
                    day = "Saturday";
                default:
                    $('.methodError').removeClass('invalid-feedback ')
                    break;
            }

        }

        <?php if($plan->price <= 0): ?>
          
            $(document).ready(function() {

                $('#paymentMethod').val('Free');
                $('#paymentAmount').val(<?php echo e($plan->price); ?>);
                $('#paymentTID').val('');
                $('#value_1').val('');
                $('#order_payment_done').submit();

            });
        <?php endif; ?>
    </script>

    <?php if(readConfig('PAYPAL_ACTIVE') == 'on'): ?>
        <script>
            "use strict"

            function paypalPayment() {
                $('#paymentMethod').val('paypal');
                $('#paymentAmount').val(<?php echo e($plan->price); ?>);
                $('#paymentTID').val('');
                $('#value_1').val('');
                $('#order_payment_done').submit();
            }
        </script>
    <?php endif; ?>


    <?php if(readConfig('bank_status') == 'on'): ?>
        <script>
            "use strict"

            function bankPayment() {

                var planId = $('#plan_id').val();
                // var formData = $('#order_payment_done').serialize();
                var url = '<?php echo e(route('checkout.bank')); ?>' + '?plan_id=' + planId;
                forModal(url, 'Bank Payment Methods');
            }
        </script>
    <?php endif; ?>




    <?php if(readConfig('STRIPE_ACTIVE') == 'on'): ?>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script>
            "use strict"

            function stripPaymnet() {

                // e.preventDefault();
                $('#paymentMethod').val('stripe');
                $('#paymentAmount').val(<?php echo e($plan->price); ?>);
                $('#paymentTID').val('');
                $('#value_1').val('');

                // Stripe.setPublishableKey($('#order_payment_done').data('stripe-publishable-key'));
                Stripe.setPublishableKey("<?php echo e(readConfig('STRIPE_KEY')); ?>");
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);

            }

            function stripeResponseHandler(status, response) {

                console.log(response);
                console.log(status);
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $('#order_payment_done').append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $('#order_payment_done').submit();
                    $('#order_payment_done').submit();
                }
            }
        </script>
    <?php endif; ?>



    <?php if(readConfig('RAZORPAY_ACTIVE') == 'on'): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            "use strict"

            function razorPaymnet() {

                debugger
                var SITEURL = '<?php echo e(URL::to('/')); ?>';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var options = {
                    "key": "<?php echo e(readConfig('RAZORPAY_KEY')); ?>",
                    "amount": (<?php echo e($plan->price); ?> * 100), // 2000 paise = INR 20
                    "name": "<?php echo e($plan->name); ?>",
                    "description": "Payment",
                    "image": "<?php echo e(filePath(readConfig('type_logo'))); ?>",
                    "handler": function(response) {
                        window.location.href = SITEURL + '/' + 'paysuccess?payment_id=' + response
                            .razorpay_payment_id + '&product_id=' + product_id + '&amount=' + totalAmount;
                    },
                    "prefill": {
                        "contact": '<?php echo e($user->phone); ?>',
                        "email": '<?php echo e($user->email); ?>',
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                // e.preventDefault();

                $('#order_payment_done').submit();
            }
        </script>
    <?php endif; ?>

    <?php if(readConfig('MOLLIE_ACTIVE') == 'on'): ?>
        <script>
            "use strict"
            // MOLLIE_ACTIVE
            function molliePaymnet() {
                $('.molliePaymnet').submit();
            }
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/plan/purchase.blade.php ENDPATH**/ ?>