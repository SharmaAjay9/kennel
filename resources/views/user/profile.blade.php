@extends('layouts.app')
@section('content')
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                     <!-- Sidebar Widgets -->
                     @include('user.profile-sidebar')
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <!-- Row -->
                     <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                           <ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                              <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                              <li><a href="#password" data-toggle="tab">Password</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="profile-edit tab-pane fade in active" id="profile">
                                 <h2 class="heading-md">View your Name, ID and Email Addresses.</h2>
                                 
                                 <dl class="dl-horizontal">
                                    <dt><strong>Profile Picture </strong></dt>
                                    <dd>
                                       @if($User->image != '')
                                       @if(strpos($User->image,'public')  !== false)
                                                <img src="{{asset('storage'.str_replace('public','',$User->image))}}" alt="img">
                                             @else
                                             <img src="{{$User->image}}" alt="">
                                             @endif
                                       @else
                                          No Image Found
                                       @endif
                                    </dd>
                                    <dt><strong>Profile name </strong></dt>
                                    <dd>
                                       {{@$User->profile_name}}
                                    </dd>
                                    <dt><strong>Your name </strong></dt>
                                    <dd>
                                       {{$User->name}}
                                    </dd>
                                    <dt><strong>Email Address </strong></dt>
                                    <dd>
                                       {{$User->email}}
                                    </dd>
                                    <dt><strong>Phone Number </strong></dt>
                                    <dd>
                                       {{$User->mobile}}
                                    </dd>

                                    <dt><strong>State </strong></dt>
                                    <dd>
                                    {{@$User->State_name->name}}
                                    </dd>
                                    <dt><strong>City </strong></dt>
                                    <dd>
                                       {{@$User->City_name->name}}
                                    </dd>

                                    <dt><strong>Description </strong></dt>
                                    <dd>
                                       {{@$User->desc}}
                                    </dd>
                                 </dl>
                              </div>
                              <div class="profile-edit tab-pane fade" id="edit">
                                 <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                                 <p>Manage Your Account</p>
                                 <div class="clearfix"></div>
                                 <form action="{{route('user.update.profile',['id'=>base64_encode($User->id)])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-12 col-sm-12 col-xs-12">	
                                       
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Profile Name </label>
                                          <input type="text" class="form-control margin-bottom-20" name="profile_name" value="{{@$User->profile_name}}">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Your Name </label>
                                          <input type="text" class="form-control margin-bottom-20" name="name" value="{{$User->name}}">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Email Address <span class="color-red">*</span></label>
                                          <input type="email" class="form-control margin-bottom-20" name="email" value="{{$User->email}}">
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">  
                                          <label>Contact Number <span class="color-red">*</span></label>
                                          <input type="tel" class="form-control margin-bottom-20" name="mobile" value="{{$User->mobile}}">
                                       </div>
                                       <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                          <label>State <span class="color-red">*</span></label>
                                          <select class="category form-control" name="state_id" required>
                                             <option label="Select Option"></option>
                                             @foreach($States as $state)
                                                <option value="{{$state->id}}" @if($User->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
                                          <label>City <span class="color-red">*</span></label>
                                          <select  name="city_id" class="category form-control" required>
                                             <option label="Select Option"></option>
                                             @foreach($City as $city)
                                                <option value="{{$city->id}}" @if($User->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>About me or Business <span class="color-red">*</span></label>
                                          <textarea name="desc" class="form-control margin-bottom-20" rows = "3">{{@$User->desc}}</textarea>
                                       </div>
                                    </div>
                                    <div class="row margin-bottom-20">
                                       <div class="form-group">
                                       <input class="form-control-file" type="file" name="image" >
                                          
                                       </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">

                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                          <button type="submit" class="btn btn-theme btn-sm">Update My Info</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="profile-edit tab-pane fade" id="password">
                                 <h2 class="heading-md">Manage Your password.</h2>
                                 <div class="clearfix"></div>
                                 <form action="{{route('user.update.profile.password',['id'=>base64_encode($User->id)])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-12 col-sm-12 col-xs-12">	
                                       
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Old Password <span class="color-red">*</span></label>
                                          <input type="password" class="form-control margin-bottom-20" required name="old_password">
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>New Password <span class="color-red">*</span></label>
                                          <input type="password" class="form-control margin-bottom-20" required name="password">
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Confirm New Password <span class="color-red">*</span></label>
                                          <input type="password" class="form-control margin-bottom-20" required name="confirm_password">
                                       </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">

                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                          <button type="submit" class="btn btn-theme btn-sm">Update Password</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
   @endsection


   @section('script')
<script>
   $('[name="state_id"]').on('change', function(e){
      e.preventDefault();

    let state_id = $(this).val();
    if(state_id == '' || typeof state_id == null){
      toastr.error(`state can not be blank`);
      return ;
    }


    let response = KennelPost({
              data:{
                  'state_id':state_id
              },
              function_type:'AJAX_DATA',
              type : 'GET_CITY',
              method : 'POST',
              dataType : 'JSON'
            });
     
     if(response.status == 200){
        $('[name="city_id"]').html(response.data);
     }else{
      toastr.warning(response.Message);
     }

});


</script>
      <!-- JS -->
      @endsection