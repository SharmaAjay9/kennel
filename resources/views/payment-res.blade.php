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
                  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel text-center">
                           <h3 class="main-title ">
                              Payment Status
                           </h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-12"></div>
                        <div class="col-md-6 col-sm-6 col-12">
                        <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Order ID</th>
                                    <td>{{@$order_id}}</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID</th>
                                    <td>{{@$transaction_id}}</td>
                                </tr>
                                
                                <tr>
                                    <th>Transaction Date and time</th>
                                    <td>{{@$date}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>
                                        @if(@$payment_status == 'success')
                                            <span class="btn btn-success">{{@$payment_status}}</span>
                                        @elseif(@$payment_status == 'processing')
                                            <span class="btn btn-info">{{@$payment_status}}</span>
                                        @else
                                            <span class="btn btn-danger">{{@$payment_status}}</span>
                                        @endif
                                        
                                    </td>
                                </tr>
                        </table>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12"></div>
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
@endsection