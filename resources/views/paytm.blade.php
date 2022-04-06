@extends('layouts.app')

@section('content')



 <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
 <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Pay
                           </h3>
                        </div>


                        @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <form action="{{ route('user.make.payment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ad_id" value="{{@$ad_id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name" required value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-12">
                                <strong>Mobile No:</strong>
                                <input type="text" name="mobile" class="form-control" maxlength="10" placeholder="Mobile No." required value="{{Auth::user()->mobile}}">
                            </div>
                            <div class="col-md-12">
                                <strong>Email:</strong>
                                <input type="email" class="form-control" placeholder="Email" name="email" required value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-12" >
                                <br/>
                                <div class="btn btn-info">
                                   Amount :  {{@$ad_amount ? @$ad_amount : env('ADS_FEE')}} INR
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br/>
                                <button type="submit" class="btn btn-success">Pay Now</button>
                            </div>
                        </div>
                    </form>
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Saftey Tips </a></h4>
                           </div>
                           <div class="widget-content">
                              <p class="lead">Posting an ad on <a href="{{route('/')}}">Kennel Near Me</a> is free! However, all ads must follow our rules:</p>
                              <ol>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not put your email or phone numbers in the title or description.</li>
                                 <li>Do not post the same ad more than once</li>
                                 <li>Please use only polite wordings in description or during reply to buyers</li>
                                 <li>Do not post misleadign ads, your services may suspended</li>
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End --><!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
@endsection