@include('layouts.header')

@include('layouts.sidebar')

@section('body')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Orders Listing</h4>
            <h4 class="card-title">Maximum Seling Car {{ $maxSellingCar }}</h4>
            <h4 class="card-title">Least Seling Car {{ $minSellingCar }}</h4>
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
                @if(sizeof($orders) > 0)
                  <?php $i = 0; ?>
                  @foreach($orders as $order)
                  <tr>
                    <td> {{ ++$i }} </td>
                    <td class="py-1">
                      {{ $order->orderDate }}
                    </td>
                    <td>
                      {{ $order->requiredDate }}
                    </td>
                    <td>
                      {{ $order->shippedDate }}
                    </td>
                    <td>
                      {{ $order->customerNumber }}
                    </td>
                    <td>
                      {{ $order->status }}
                    </td>
                  </tr>
                  @endforeach
                @else
                  <h3 class="text-center">No Record Found</h3>
                @endif
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
@endsection

@yield('body')
@include('layouts.footer')
