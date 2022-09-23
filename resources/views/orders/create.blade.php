@include('layouts.header')

@include('layouts.sidebar')

@section('body')
<div class="main-panel">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 offset-md-2 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Create Order.</h6>
              <form data-toggle="validator" id="createOrderForm" role="form" method="post" action="#">
                @csrf
                <div class="form-group">
                  <label for="exampleSelectGender">Order Date *</label>
                  <input type="date" class="form-control" name="orderDate" id="orderDate">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Required Date *</label>
                  <input type="date" class="form-control" name="requiredDate" id="requiredDate" required>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Shipped Date *</label>
                    <input type="date" class="form-control" name="shippedDate" id="shippedDate">
                </div>
                <div class="form-group">
                  <label for="status">Status *</label>
                  <input type="text" class="form-control" name="status"  id="status"="true">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Comment *</label>
                      <textarea class="form-control form-control-lg" name="comments" id="comments" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Select Customer *</label>
                  <select class="form-control" id="customerNumber" name="customerNumber">
                    @foreach($customers as $customer)
                      <option value="{{ $customer->id }}">{{ $customer->contactFirstName . '-' . $customer->contactLastName }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Select Product *</label>
                  <select class="form-control" id="productCode" name="productCode">
                    @foreach($products as $product)
                      <option value="{{ $product->productCode }}">{{ $product->productName }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Quantity *</label>
                  <input type="number" class="form-control form-control-lg" min="0" name="quantityOrdered"  id="quantityOrdered" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Price *</label>
                  <input type="number" class="form-control form-control-lg" min="0" name="priceEach"  id="priceEach" placeholder="Price">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Order Line number *</label>
                  <input type="number" class="form-control form-control-lg" name="orderLineNumber"  id="orderLineNumber">
                </div>
                <div class="form-group">
                  <label for="status">Check Numbers</label>
                  <input type="text" class="form-control" name="checkNumber"  id="checkNumber">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Payment Date</label>
                  <input type="date" class="form-control" name="paymentDate" id="paymentDate">
                </div>
                <div class="mt-3">
                <a class="anchor-sh" style="text-decoration: none;" href="javascript:void(0)">
                      <input type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn createOrderBtn"
                              value="Create" name="submit">
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
@endsection
@yield('body')
@include('layouts.footer')
<!-- endinject -->
