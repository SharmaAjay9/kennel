@extends('layouts.app')
@section('style')
    <style>
        nav.flex.items-center .flex.justify-between span{
            padding: 2rem;
        }
    </style>
@endsection
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
                              <li class="active">
                                  <a href="#profile" data-toggle="tab">{{Ucfirst(@$type)}} Ads :</a>
                                </li>
                                
                           </ul>
                           <div class="tab-content">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                    <form class="col-md-6" style="margin-top:1rem;">
                                        <input type="text" class="form-control" name="search" placeholder="Type keyword and press enter key" value="{{@$search}}">
                                    </form>
                                        </div>
                              <div class="profile-edit tab-pane fade in active table-responsive" id="profile">
                                 
                                 <table class="table table-hover ">
                                     <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th style="width:300px">Ad Type</th>
                                            <th style="width:200px">Title</th>
                                            <th style="width:300px">Pet Type</th>
                                            <th style="width:200px">Pet Bread</th>
                                            <th style="width:200px">Price</th>
                                            <th style="width:400px">Expiry Date</th>
                                            <th style="width:200px">Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                         @forelse($Posts as $post)
                                            <tr>
                                                <td>
                                                {{ (($Posts->currentPage() - 1) * $Posts->perPage()) + $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{Ucfirst(@$post->ad_type)}}
                                                </td>
                                                <td>
                                                    {{@$post->title}}
                                                </td>
                                                <td>
                                                    {{Ucfirst(@$post->Pet->pet_name)}}
                                                </td>
                                                <td>
                                                    {{Ucfirst(@$post->PetBread->breads_name)}}
                                                </td>
                                                <td>
                                                    {{@$post->price}} INR
                                                </td>
                                                <td>
                                                    {{@$post->expiry}}
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" style="margin-right:1rem"><i class="fa fa-eye"></i></a>
                                                    <a target = "_blank" href="{{route('user.edit.post-ad',['id'=>$post->id])}}"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                
                                            </tr>
                                         @empty
                                         <tr class="text-center">
                                             <td colspan="8">No Record found</td>
                                         </tr>
                                         @endforelse
                                     </tbody>
                                 </table>

                                 <br>
                                 <br>
                                 {{ isset($Posts) ? $Posts->links() : '' }}
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