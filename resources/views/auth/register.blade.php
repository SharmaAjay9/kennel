@extends('layouts.app')
     @section('content')
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bg ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
                     <!--  Form -->
                     <div class="form-grid">
                     <form method="POST" action="{{ route('register') }}" class="row">
                        @csrf
                        
                        <div class="form-group col-md-6">
                              <label>Profile Name <span class="text-danger">*</span></label>
                              <input placeholder="Enter your Profile name" type="text" class="form-control @error('profile_name') is-invalid @enderror" name="profile_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('profile_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label>Name</label>
                              <input id="name" placeholder="Enter your name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-12">
                              <label>Contact Number</label>
                              <input placeholder="Enter Your Contact Number" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" type="tel" name="mobile" required>
                              @error('mobile')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-12">
                              <label>Email</label>
                              <input placeholder="Enter Your Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-12">
                              <label>Password</label>
                              <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>

                           <div class="form-group col-md-12">
                              <label>Confirm Password</label>
                              <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>

                           <div class="form-group">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-7">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-1" required>
                                             <label for="minimal-checkbox-1">i agree <a href="{{route('terms')}}">Terms of Services</a></label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-5 text-right">
                                    <p class="help-block"><a data-target="#myModal" data-toggle="modal">Forgot password?</a>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <button class="btn btn-theme btn-lg btn-block">Register</button>
                        </form>
                     </div>
                     <!-- Form -->
                  </div>
                  <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
                     <div class="heading-panel">
                        <h3 class="main-title text-left">
                           Sign In to your account   
                        </h3>
                     </div>
                     <div class="content-info">
                        <div class="features">
                           <div class="features-icons">
                              <img src="images/icons/chat.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>Sign up With Social Media</h3>
                              <p> Sign up With <strong><a href="{{route('login.social',['provider'=>'facebook'])}}">Facebook </a></strong> </p>
                              <p> Sign up With <strong><a href="{{route('login.social',['provider'=>'google'])}}">Gmail</a></strong> </p>
                           </div>
                        </div>
                      <span class="arrowsign hidden-sm hidden-xs"><img src="images/arrow.png" alt="" ></span>
						   
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
@endsection