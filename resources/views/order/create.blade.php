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
        <form action="{{ route('order.store') }}" method="post">
          @csrf
          <div class="row">
            <table id="myTable" class="text-center table order-list table-bordered table-hover">
              <thead>
                <tr>
                  <th width="5%"> # </th>
                  <th width="40%"> Link </th>
                  <th width="15%"> Quantity </th>
                  <th width="35%"> Description </th>
                  <th width="15%"> Action </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1</th>
                  <td>
                      <input type="text" name="link[]" class="form-control" placeholder="Link Here-> https://www.amazon.co.uk/dp/B07PJV3JPR/">
                  </td>
                  <td>
                      <input type="number" name="qty[]" class="form-control" placeholder="Quantity">
                  </td>
                  <td>
                      <input type="text" name="description[]" class="form-control" placeholder="Size / Color or Other Info">
                  </td>
                  <td><input type="button" class="ibtnDel btn btn-danger btn-sm" disabled value="Delete"></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5" class="text-center">
                      <button type="button" id="addrow" class="btn btn-primary btn-sm">Add New Link</button>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="row">
              <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-success btn-sm">Request Quote</button>
                </div>
          </div>
        </form>
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
            counter = $('#myTable tr').length - 1;
            var newRow = $("<tr>");
            var cols = "";
            cols += '<th>' + counter + '</th>';
            cols += '<td><input type="text" name="link[]" class="form-control" placeholder="Link Here-> https://www.amazon.co.uk/dp/B07PJV3JPR/"></td>';
            cols += '<td><input type="number" name="qty[]" class="form-control" placeholder="Quantity"></td>';
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