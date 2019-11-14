@extends('template.user')

@section('title', 'Order Details')

@section('type', 'profile')

@section('content_top')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>Order Details</h1>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
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

    $count = 1;
@endphp
@section('content')
<div class="main main-raised">
    <div class="alert alert-success">
        <div class="container">
          <div class="row text-center">
              <div class="col-md-6">
                  <h3> <b> Order Number:</b> #{{ $order-> id }}</h3> 
                </div>
                <div class="col-md-6">
                  <h3> <b>Order Status:</b>  {{ statusCheck($order-> status) }}</h3>
                </div>
          </div>
        </div>
      </div>
    <div class="section section-basic">
      <div class="container">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Link</th>
              <th>Qty</th>
              <th>Description</th>
              @if ($order-> status != 0)
                <th>Price GBP</th>
                <th><abbr title="Postage is UK to UK delivery charge taken by the website you are ordering from."> Postage</abbr> GBP</th>
                <th>Price BDT</th>
                <th>Custom's Tax BDT</th>
              @endif
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order->quotes as $quote)
                <tr>
                  <td> <a class="btn btn-outline-success" href="{{ $quote->link }}" target="_blank">Link {{ $count++ }}</a> </td>
                  <td>{{ $quote->qty }}</td>
                  <td>{{ $quote->description }}</td>
                  @if ($order-> status != 0)
                      <td>{{ $quote->price_gbp }}</td>
                      <td>{{ $quote->postage_gbp }}</td>
                      <td>{{ $quote->price_bdt }}</td>
                      <td>{{ $quote->tax_bdt }}</td>
                  @endif
                  <td> 
                    <a class="btn btn-sm btn-warning" href="{{ route('quote.edit', $quote->id) }}">Edit</a> 
                    <a class="btn btn-sm btn-danger" href="{{ $quote->id }}">Delete</a> 
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
