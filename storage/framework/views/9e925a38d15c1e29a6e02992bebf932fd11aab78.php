
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php $__env->startSection('script'); ?>
  <!-- plugins:js -->
  <script src="<?php echo e(asset('vendors/js/vendor.bundle.base.js')); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo e(asset('vendors/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/progressbar.js/progressbar.min.js')); ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('js/template.js')); ?>"></script>
  <script src="<?php echo e(asset('js/settings.js')); ?>"></script>
  <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('js/Chart.roundedBarCharts.js')); ?>"></script>
  <script>
  $(document).ready(function(){
      $('.createOrderBtn').click(function () {
          var data = $('#createOrderForm').serialize();
          $.ajax({
              type: 'POST',
              url: '<?php echo e(route("createOrder")); ?>',
              data: data,
              success: function (response, status) {
                  console.log('response', response)
                  if (response.status) {
                      $("#createOrderForm")[0].reset();
                      alert(response.message);
                  } else {
                      alert(response.message);
                  }
              },
              error: function (data) {
                  alert('Something went wrong, while creating order. Try Filling all the required values');
                  $.each(data.responseJSON.errors, function (key, value) {
                  });
              }
          });
      });
  });
</script>
<!-- End custom js for this page-->
<?php $__env->stopSection(); ?>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH E:\wamp64\www\task\resources\views/layouts/footer.blade.php ENDPATH**/ ?>