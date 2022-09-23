<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('body'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Orders Listing</h4>
            <h4 class="card-title">Maximum Seling Car <?php echo e($maxSellingCar); ?></h4>
            <h4 class="card-title">Least Seling Car <?php echo e($minSellingCar); ?></h4>
            <div class="table-responsive">
              <table class="table" id="data_table">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Order Date
                    </th>
                    <th>
                      Required Date
                    </th>
                    <th>
                      ShippedDate
                    </th>
                    <th>
                      Customer No
                    </th>
                    <th>
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php if(sizeof($orders) > 0): ?>
                  <?php $i = 0; ?>
                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td> <?php echo e(++$i); ?> </td>
                    <td class="py-1">
                      <?php echo e($order->orderDate); ?>

                    </td>
                    <td>
                      <?php echo e($order->requiredDate); ?>

                    </td>
                    <td>
                      <?php echo e($order->shippedDate); ?>

                    </td>
                    <td>
                      <?php echo e($order->customerNumber); ?>

                    </td>
                    <td>
                      <?php echo e($order->status); ?>

                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <h3 class="text-center">No Record Found</h3>
                <?php endif; ?>
                </tbody>
                <ul id="pagination-demo" class="pagination-sm"></ul>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- main-panel ends -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('body'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\wamp64\www\task\resources\views/orders/listing.blade.php ENDPATH**/ ?>