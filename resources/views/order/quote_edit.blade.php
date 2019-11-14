@extends('template.user')

@section('title', 'Edit Link')

@section('type', 'profile')

@section('content_top')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>Edit Link</h1>
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
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Ops! Errors!!</h4>
              <ol>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ol>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <hr>
  <p class="mb-0">Please Fix these errors!</p>
            </div>
          @endif
          
        <form action="{{ route('quote.update', $quote->id) }}" method="POST">
          @csrf
          <div class="row">
            <table id="myTable" class="text-center table order-list table-bordered table-hover">
              <thead>
                <tr>
                  <th width="5%"> # </th>
                  <th width="40%"> Link </th>
                  <th width="15%"> Quantity </th>
                  <th width="35%"> Description </th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <th>{{ $quote->id }}</th>
                      @method('PUT')
                      <td>
                          <input type="text" name="link" class="form-control" placeholder="Link Here-> https://www.amazon.co.uk/dp/B07PJV3JPR/" value="{{ $quote->link }}">
                      </td>
                      <td>
                          <input type="number" name="qty" min="1" value="{{ $quote->qty }}" class="form-control" placeholder="Quantity">
                      </td>
                      <td>
                          <input type="text" value="{{ $quote->description }}" name="description" class="form-control" placeholder="Size / Color or Other Info">
                      </td>
                    </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
              <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-success btn-sm">Update Quote</button>
                </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

