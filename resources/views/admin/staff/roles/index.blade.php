@extends('admin.layouts.app')

@section('content')

<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('All Roles')}}</h1>
        </div>
     
        <div class="col-md-6 text-right">
            <a href="{{route('roles.create')}}" class="btn btn-circle btn-primary">{{translate('Add New Role')}}</a>
        </div>
       
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header row gutters-5">
  				<div class="col text-center text-md-left">
  					<h5 class="mb-md-0 h6">{{ translate('All Roles') }}</h5>
  				</div>
  				<div class="col-md-3">
  					<form class="" id="sort_members" action="" method="GET">
  						<div class="input-group input-group-sm">
  					  		<input type="text" class="form-control" id="search" name="search" value="{{@$search}}" placeholder="{{ translate('Type name') }}">
  						</div>
  					</form>
  				</div>
		    </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>{{translate('Name')}}</th>
                            <th class="text-right">{{translate('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                <td class="text-right">
                                        <a href="{{route('roles.edit', encrypt($role->id))}}" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-href="{{route('roles.destroy', $role->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
