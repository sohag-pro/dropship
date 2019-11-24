@extends('template.user')

@section('title', 'My Orders')

@section('type', 'profile')

@section('content_top')
<!--Delete Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger bg-danger">
        <h5 class="">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card">
              <div class="card-body">
                  <h4>Are you sure want to delete this order?</h4>
                  <p>Remember: <b>It's Permanent. You can't reverse this action.</b></p>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-outline-success" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;
        <button type="button" id="delete_ok" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<!-- Cancel Modal -->
<div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger bg-danger">
        <h5 class="">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card">
              <div class="card-body">
                  <h4>Are you sure want to Cancel this order?</h4>
                  <p>Remember: <b>It's Permanent. You can't reverse this action.</b></p>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-outline-success" data-dismiss="modal">No</button>&nbsp;&nbsp;&nbsp;
        <button type="button" id="cancel_ok" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--Cancel Modal -->

<div class="page-header header-filter clear-filter purple-filter" data-parallax="true"
  style="background-image: url('{{ asset('img/bg2.jpg') }}');">
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
    @if(session()->has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session()->get('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
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
            <td>
              <a title="Details" class="btn btn-sm btn-success" href="{{ route('order.show', $order->id) }}"><i
                  class="material-icons">assignment</i></a>
              @if ($order->status == 0)
              <button data-id="{{ $order->id }}" title="Delete" class="btn btn-sm btn-danger delete"><i class="material-icons">delete</i></button>
              @else
              <button title="Cancel" data-id="{{ $order->id }}" class="btn btn-sm btn-danger cancel" ><i class="material-icons">clear</i></button>
              @endif
            </td>
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
          var id;
          // handle delete button click with modal
          $('body').on('click', '.delete', function(e) {
            e.preventDefault();

            // get the id of the todo task
            id = $(this).attr('data-id');

            $('#delete_modal').modal('show');
          });



          // handle delete ok button click
          $('body').on('click', '#delete_ok', function(e) {
          e.preventDefault();

          // get csrf token value
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          $('#delete_modal').modal('hide');
          // now make the ajax request
          $.ajax({
            'url': '/order/' + id,
            'type': 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrf_token }
          }).done(function() {
            window.location = window.location.href;
          }).fail(function() {
            alert('something went wrong! Please Contact Admin!!');
          });
        });


          var idc;
          // handle delete button click with modal
          $('body').on('click', '.cancel', function(e) {
            e.preventDefault();

            // get the id of the todo task
            idc = $(this).attr('data-id');

            $('#cancel_modal').modal('show');
          });



          // handle delete ok button click
          $('body').on('click', '#cancel_ok', function(e) {
          e.preventDefault();

          // get csrf token value
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          $('#cancel_modal').modal('hide');
          // now make the ajax request
          $.ajax({
            url: '/status',
            type: 'POST',
            data: {'id': id},
            headers: { 'X-CSRF-TOKEN': csrf_token }
          }).done(function() {
            window.location = window.location.href;
          }).fail(function() {
            alert('something went wrong! Please Contact Admin!!');
          });
        });
    });
    
</script>
@endsection