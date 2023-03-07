<div class="card-body">
    <form action="<?php echo e(route('plan.purchase.store')); ?>" method="post" id="order_payment_done" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
        <input type="hidden" id="paymentMethod" name="paymentMethod" value="bank">
        <input type="hidden" id="paymentAmount" name="paymentAmount" value="<?php echo e($plan->price); ?>">
        <input type="hidden" id="paymentTID" name="paymentTID" value="">
        <p class="text-center m-3"><?php echo e(readConfig('about_bank')); ?></p>
        <ul class="list-group">
            <li class="list-group-item">Bank Name: <?php echo e(readConfig('bank_name')); ?></li>
            <li class="list-group-item">Account Name: <?php echo e(readConfig('account_name')); ?></li>

            <li class="list-group-item">Account Number: <?php echo e(readConfig('account_number')); ?></li>
            <li class="list-group-item">Swift Code: <?php echo e(readConfig('swift_code')); ?></li>
            <li class="list-group-item">Routing Number: <?php echo e(readConfig('routing_number')); ?></li>
        </ul>

        <div class="form-group mt-2 mb-2">
            <label class="control-label">Attach document</label>
            <input type="file" name="value_1" class="form-control" />
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/plan/bank.blade.php ENDPATH**/ ?>