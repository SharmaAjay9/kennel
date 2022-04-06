@extends('admin.layouts.app')

@section('content')

<div class="col-lg-6 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Staff Information')}}</h5>
        </div>

        <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
            <input name="_method" type="hidden" value="PATCH">
        	@csrf
            <div class="card-body">
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="first_name">{{translate('Name')}}</label>
                  <div class="col-sm-9">
                      <input type="text" name="name" value="{{ $staff->name }}" placeholder="{{translate('First Name')}}" id="first_name" class="form-control" required>
                  </div>
              </div>
              
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="email">{{translate('Email')}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ $staff->email }}" placeholder="{{translate('Email')}}" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="mobile">{{translate('Phone')}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" value="{{ $staff->mobile }}" placeholder="{{translate('Phone')}}" id="mobile" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="password">{{translate('Password')}}</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="{{translate('Password')}}" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="password">{{translate('Role')}}</label>
                    <div class="col-sm-9">
                        <select name="role_id" required class="form-control aiz-selectpicker">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($role->id == $staff->role_id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="password">{{translate('Status')}}</label>
                    <div class="col-sm-9">
                        <select name="status" required class="form-control aiz-selectpicker">
                            <option value="">Please select</option>
                            <option value="1" @if(@$staff->status =='1') selected @endif>Active</option>
                           <option value="0" @if(@$staff->status =='0') selected @endif>In-Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
