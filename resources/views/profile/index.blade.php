@extends('template.user')

@section('title', 'Profile')

@section('type', 'profile')

@section('content_top')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>Profile</h1>
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
        <div class="card">
          <div class="card-body">
            <h2>Name: {{ $user->name }}</h2>
            <h3>Email: {{ $user->email }}</h3>
            <h3>Registered At: {{ $user->created_at }}</h3>
          </div>
          
        </div>
      </div>
    </div>
  </div>
@endsection
