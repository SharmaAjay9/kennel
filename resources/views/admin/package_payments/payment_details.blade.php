<div class="modal-header">
    <h5 class="modal-title h6">{{translate('Payment Details')}}</h5>
    <button type="button" class="close" data-dismiss="modal"></button>
</div>
<div class="modal-body">
  <table class="table table-bordered">
      <tbody>
          <tr>
              <th>{{translate('Payment Method')}}</th>
              <td>{{ 'Paytm' }}</td>
          </tr>
          <tr>
              <th>{{translate('Transaction Id')}}</th>
              <td>{{ $package_payment->transaction_id }}</td>
          </tr>
          <tr>
              <th>{{translate('Order Id')}}</th>
              <td>{{ $package_payment->order_id }}</td>
          </tr>
          <tr>
              <th>{{translate('Details')}}</th>
              <td>

              <table>
                  <tr>
                      <th>Name </th>
                      <th>{{$package_payment->name}} </th>
                  </tr>
                  <tr>
                      <th>Email </th>
                      <th>{{$package_payment->email}} </th>
                  </tr>
                  <tr>
                      <th>Mobile </th>
                      <th>{{$package_payment->mobile}} </th>
                  </tr>
              </table>
              </td>
          </tr>
      </tbody>
  </table>
</div>
<div class="modal-footer">
    @if($package_payment->status == '2')
      <a href="{{ route('manual_payment_accept', $package_payment->id) }}" class="btn btn-sm btn-success">{{translate('Accept')}}</a>
    @endif
    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">{{translate('Close')}}</button>
</div>
