@extends('template.user')

@section('title', 'Home')

@section('type', 'index')

@section('content_top')
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg2.jpg') }}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>SendCargo</h1>
            <h3>We Bring Items From UK Amazon.</h3>
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
        <div class="title">
            <h2>How to Order?</h2>
        </div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut non consectetur minima unde accusamus rerum quia, natus quaerat libero incidunt error similique reiciendis culpa! Culpa error debitis autem earum asperiores!Lorem
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam cumque rem tempora magnam nulla eligendi fugit culpa accusantium blanditiis autem. Fugit eveniet omnis aut et necessitatibus quisquam nesciunt, voluptatem unde!</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut non consectetur minima unde accusamus rerum quia, natus quaerat libero incidunt error similique reiciendis culpa! Culpa error debitis autem earum asperiores!Lorem
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam cumque rem tempora magnam nulla eligendi fugit culpa accusantium blanditiis autem. Fugit eveniet omnis aut et necessitatibus quisquam nesciunt, voluptatem unde!</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut non consectetur minima unde accusamus rerum quia, natus quaerat libero incidunt error similique reiciendis culpa! Culpa error debitis autem earum asperiores!Lorem
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam cumque rem tempora magnam nulla eligendi fugit culpa accusantium blanditiis autem. Fugit eveniet omnis aut et necessitatibus quisquam nesciunt, voluptatem unde!</p>
        <div class="space-50"></div>
        </div>
    </div>
</div>
@endsection