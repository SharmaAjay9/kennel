@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Edit Package Info')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('packages.update', base64_encode($type)) }}" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        @csrf
                        

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Price')}}</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <input type="number" name="price" value="{{env($type)}}" class="form-control" placeholder="{{translate('Price')}}" min="0" required>
                                </div>
                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3 text-right" style="margin-top:2rem">
                            <button type="submit" class="btn btn-primary">{{translate('Update Package Info')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
