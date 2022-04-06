@extends('admin.layouts.app')
@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('Premium Packages')}}</h1>
		</div>
		
		<!-- <div class="col-md-6 text-md-right">
			<a href="{{ route('packages.create') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add New Payment Type')}}</span>
			</a>
		</div> -->
		
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('All Payment Type')}}</h5>
            </div>
            <div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>{{translate('Name')}}</th>
							<th data-breakpoints="md">{{translate('Price')}}</th>
							<th class="text-right" width="10%">{{translate('Options')}}</th>
						</tr>
					</thead>
				<tbody>
					<tbody>

					<tr>
						<td>1</td>
						<td>ADS FEE</td>
						<td>{{ env('ADS_FEE') }}</td>
						<td class="text-right">
								<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('packages.edit',base64_encode('ADS_FEE')) }}" title="{{ translate('Edit') }}">
									<i class="las la-edit"></i>
								</a>
							</td>
					</tr>

					<tr>
						<td>2</td>
						<td>ADS UPDATE FEE</td>
						<td>{{ env('ADS_UPDATE_FEE') }}</td>
						<td class="text-right">
								<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('packages.edit', base64_encode('ADS_UPDATE_FEE')) }}" title="{{ translate('Edit') }}">
									<i class="las la-edit"></i>
								</a>
							</td>
					</tr>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>
@endsection
