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