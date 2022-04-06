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
                     <form method="POST" action="{{ route('login') }}">
                        @csrf
                           <div class="form-group">
                           <label>Email</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-xs-12">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                          <input type="checkbox" name="remember"id="minimal-checkbox-1" {{ old('remember') ? 'checked' : '' }}>
                                             <!-- <input  type="checkbox" id="minimal-checkbox-1"> -->
                                             <label for="minimal-checkbox-1">Remember Me</label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button class="btn btn-theme btn-lg btn-block">Login With Us</button>
						   
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
                              <img src="images/icons/panel.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>Dont' have account!</h3>
                              <p>
                                 <p><strong><a href="{{route('register')}}">Register with Us</a></strong> and start selling &amp; boarding pets.</p>
                              </p>
                           </div>
						   
                        </div>
                        <div class="features">
                           <div class="features-icons">
                              <img src="images/icons/chat.png" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>Sign in With Social Media</h3>
                              <p> Sign in With <strong><a href="{{route('login.social',['provider'=>'facebook'])}}">Facebook </a></strong> </p>
                              <p> Sign in With <strong><a href="{{route('login.social',['provider'=>'google'])}}">Gmail</a></strong> </p>
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