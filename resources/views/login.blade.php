<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ ('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ ('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ ('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ ('vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ ('vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ ('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ ('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ ('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form data-toggle="validator" id="loginForm" role="form" method="post" action="#">
              @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password"  id="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a class="anchor-sh" style="text-decoration: none;" href="javascript:void(0)">
                      <input type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn loginBtn"
                              value="Login" name="submit">
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ ('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ ('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ ('js/off-canvas.js') }}"></script>
  <script src="{{ ('js/hoverable-collapse.js') }}"></script>
  <script src="{{ ('js/template.js') }}"></script>
  <script src="{{ ('js/settings.js') }}"></script>
  <script src="{{ ('js/todolist.js') }}"></script>
  <script>
        $(document).ready(function(){
            $('.loginBtn').click(function () {
                var data = $('#loginForm').serialize();
                console.log('data', data)
                $.ajax({
                    type: 'POST',
                    url: '{{route("loginUser")}}',
                    data: data,
                    success: function (response, status) {
                        if (response.status) {
                            // successMsg(response.message);
                          window.location.href = response.url;
                        } else {
                            // errorMsg(response.message);
                          window.location.href = response.url;
                        }
                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                          window.location.href = '{{route("login")}}';
                        });
                    }
                });
            });
        });
        $("#password").keydown(function (e) {
            if (e.keyCode == 13) {
                $('.loginBtn').click();
            }
        });
    </script>
  <!-- endinject -->
</body>

</html>
