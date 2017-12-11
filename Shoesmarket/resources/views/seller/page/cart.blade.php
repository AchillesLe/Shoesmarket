@extends('Seller.master')
@section('content')
  
      <!-- Example DataTables Card-->
  <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
    {{ csrf_field() }}
      <div class="card-header">
          <i class="fa fa-table"></i> Thanh Toán </div>
        <div class="card-body">
          <div class="table-responsive">
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Gói tin</th>
            <th>Số lượng tin</th>
            <th>Gía</th>
        </tr>
    </thead>

    <tbody>


          <tr>
              <td>
                  <p><strong>{!! $package->name !!}</strong></p>
              </td>
              <td>{!! $package->newquantity !!}</td>
              <td>{!! $package->money !!}</td>
          </tr>

    </tbody>
    
    <tfoot>
        <tr>
          <td></td>
          <td></td>
          <td><button type="submit" class="btn btn-primary">
                                    Pay with Paypal
            </button>
          </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
</form>
@endsection