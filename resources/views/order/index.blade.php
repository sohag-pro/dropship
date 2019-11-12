@extends('template.user')

@section('title', 'My Orders')

@section('type', 'profile')

@section('content_top')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>My Orders</h1>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <h1>All orders</h1>
        <table class="table table-bordered text-center table-hover">
          <thead>
            <tr>
              <td>Order Number</td>
              <td>Status</td>
              <td>Price GBP</td>
              <td>Price BDT</td>
              <td>Details</td>
            </tr>
          </thead>
          @php
              function statusCheck($status){
                  switch ($status) {
                    case "0":
                        echo "Quote Requested";
                        break;
                    case "1":
                        echo "Payment Pending";
                        break;
                    case "2":
                        echo "Payment Done";
                        break;
                    case "3":
                        echo "Order Processing";
                        break;
                    case "4":
                        echo "Order Placed";
                        break;
                    case "5":
                        echo "Partially Arrived";
                        break;
                    case "6":
                        echo "Full Arrived";
                        break;
                    case "7":
                        echo "Delivered";
                        break;
                    case "8":
                        echo "Cancelled";
                        break;
                    case "9":
                        echo "Refunded";
                        break;
                    default:
                        echo "Error!";
                }
              }
          @endphp
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ statusCheck($order->status) }}</td>
                <td>{{ $order->price_gbp ? $order->price_gbp : 'Not yet given' }}</td>
                <td>{{ $order->price_bdt ? $order->price_bdt : 'Not yet given' }}</td>
                <td> <a class="btn btn-sm btn-success" href="{{ route('order.show', $order->id) }}">Details</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('custom_js')
    <script>
      $(document).ready(function() {
        var counter = 0;
        var limit = 100;
        $("#addrow").on("click", function() {
            counter = $('#myTable tr').length - 2;
            var newRow = $("<tr>");
            var cols = "";
            cols += '<th>' + counter + '</th>';
            cols += '<td><input type="text" name="link[]" class="form-control" placeholder="Link Here-> https://www.amazon.co.uk/dp/B07PJV3JPR/"></td>';
            cols += '<td><input type="number" name="qty[]" min="1" value="1" class="form-control" placeholder="Quantity"></td>';
            cols += '<td><input type="text" name="description[]" class="form-control" placeholder="Size / Color or Other Info"></td>';
            cols += '<td><input type="button" class="ibtnDel btn btn-danger btn-sm"  value="Delete"></td>';
            newRow.append(cols);
            if (counter >= limit) $('#addrow').attr('disabled', true).prop('value', "You've reached the limit");
            $("table.order-list").append(newRow);
            counter++;
        });
        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
            calculateGrandTotal();
            counter -= 1
            $('#addrow').attr('disabled', false).prop('value', "Add Row");
        });
    });
    
    </script>
@endsection