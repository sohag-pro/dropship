@extends('template.user')

@section('title', 'New Order')

@section('type', 'profile')

@section('content_top')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>New Order</h1>
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
        <div class="row">
          <div class="col-md-5">
            <div class="form-group has-default">
              <input type="text" class="form-control" placeholder="Link Here">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-default">
              <input type="number" class="form-control" placeholder="Quantity">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group has-default">
              <input type="text" class="form-control" placeholder="Size / Color or Other Info">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <button class="btn btn-primary btn-sm">Add New Link</button>
          </div>
          <div class="col-md-6 text-center">
            <button class="btn btn-success btn-sm">Request Quote</button>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>
@endsection