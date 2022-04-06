@extends('admin.layouts.app')
@section('content')

<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('Package Payment List')}}</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('All Payments')}}</h5>
            </div>
            <div class="card-body">
              <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Name')}}</th>
                        <th data-breakpoints="md">{{translate('Amount')}}</th>
                        <th data-breakpoints="md">{{translate('Payment Status')}}</th>
                        <th data-breakpoints="md">{{translate('Date')}}</th>
                        <th class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package_payments as $key => $package_payment)
                        <tr>
                            <td>{{ ($key+1) + ($package_payments->currentPage() - 1)*$package_payments->perPage() }}</td>
                            <td>
                              {{ @$package_payment->name}}
                            </td>
                        
                            <td>{{$package_payment->fee }}</td>
                            <td>
                              @if ($package_payment->status == '1')
                                  <span class="badge badge-inline badge-success text-center">{{ translate('Paid')}}</span>
                              @elseif($package_payment->status == '1')
                              <span class="badge badge-inline badge-success text-center">{{ translate('Processing')}}</span>
                              @else
                                  <span class="badge badge-inline badge-danger text-center">{{ translate('failed')}}</span>
                              @endif
                            </td>
                            <td>{{ $package_payment->created_at }}</td>
                            <td class="text-right">
                               
                                    <a href="javascript:void(0);" onclick="package_payment_details('{{ route('package-payments.show', $package_payment->id )}}')" class="btn btn-soft-info btn-icon btn-circle btn-sm" title="{{ translate('View Details') }}">
                                        <i class="las la-eye"></i>
                                    </a>
                              
                                    <a href="{{ route('package_payment.invoice_admin', $package_payment->id) }}" target="_blank" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="{{ translate('Invoice') }}">
                                        <i class="las la-file-invoice"></i>
                                    </a>
                              
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="aiz-pagination">
                    {{ $package_payments->links() }}
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
    @include('modals.create_edit_modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script>
      function package_payment_details(url){
          $.get(url, function(data){
              $('.create_edit_modal_content').html(data);
              $('.create_edit_modal').modal('show');
          });
      }
    </script>
@endsection
