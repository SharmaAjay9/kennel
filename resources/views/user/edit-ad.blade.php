@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{URL::to('css/dropzone.css?v='.rand())}}">
<link href="{{URL::to('css/jquery.tagsinput.min.css?v='.rand())}}" rel="stylesheet">
@endsection
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
                              Post Your Ad
                           </h3>
                        </div>
                        <p class="lead">Posting an ad on <a href="{{route('/')}}">Kennel Near Me</a> is free! However, all ads must follow our rules:</p>
                        <form  class="submit-form" method="post" action="{{route('user.edit.post-ad',['id'=>$Post->id])}}">
                           @csrf
                           <input type="hidden" name="attachment_ids">
						     <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Type Of Ad<small>want to buy or sale</small></label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input tabindex="7" type="radio" id="minimal-radio-1" name="ad_type" value="sell"  required @if($Post->ad_type == 'sell') checked @endif>
                                          <label for="minimal-radio-1">I want to sell </label>
                                       </li>
                                       <li>
                                          <input tabindex="8" type="radio" id="minimal-radio-2" name="ad_type" value="buy" required @if($Post->ad_type == 'buy') checked @endif>
                                          <label for="minimal-radio-2">I want to buy</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Title  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label"> Title <small>Do not add email/contact</small></label>
                                 <input class="form-control"  required placeholder="eg. Selling Black Pug Male 2 Years Old in Jalandhar" type="text" name="title" value="{{$Post->title}}">
                              </div>
                           </div>
                           <div class="row">
                              <!-- Category  -->

                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Type Of PET</label>
                                 <select class="category form-control" name="pet_id" required>
                                    <option value="">Please select PET</option>
                                    @foreach(@$Pet as $p)
                                       <option value="{{$p->id}}" @if($Post->pet_id == $p->id) selected @endif>{{strtoupper($p->pet_name)}}</option>
                                    @endforeach
                                 </select>
                              </div>

                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Bread <small>Select right bread</small></label>
                                 <select class="category form-control" name="bread_id" required>
                                    @foreach(@$PetBread as $p)
                                       <option value="{{$p->id}}" @if($Post->bread_id == $p->id) selected @endif>{{strtoupper($p->breads_name)}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Price<small>INR only</small></label>
                                 <input name="price" class="form-control" placeholder="eg 3500" type="number"  required value="{{$Post->price}}" >
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Image Upload  -->
                          <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Photos for your ad <small>Please add images of your ad. (350x450)</small></label>
                                 <div id="dropzone" class="dropzone"></div>


                                 <label for="" class="mt-3">Already Added Files: </label>
                                 <div class="row">
                                 @foreach($Post->attachments as $rec)
                                    <div class="col-md-4 col-sm-6">
                                        <img src="{{@$rec->path}}" alt="img" class="img-fluid">
                                        <br>
                                        <br>
                                        <a href="{{@$rec->path}}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)"  data-id="{{$rec->id}}" data-post_id="{{@$Post->id}}" class="btn btn-danger delete_file" ><i class="fa fa-trash-o"></i></a>
                                    </div>
                                 @endforeach
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Ad Description  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">Ad Description <small>Enter long description for your project</small></label>
                                 <textarea name="desc" id="desc" rows="12" class="form-control" placeholder="" required>{!!$Post->desc!!}</textarea>
                              </div>
                           </div>
                           <!-- age  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Gender<small></small></label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input name="pet_gender"  tabindex="7" required type="radio" id="minimal-radio-1" value="m"  @if($Post->pet_gender == 'm')checked @endif>
                                          <label  for="minimal-radio-1">Male</label>
                                       </li>
                                       <li>
                                          <input name="pet_gender" tabindex="8" required type="radio" value="f" id="minimal-radio-2" @if($Post->pet_gender == 'f') checked @endif >
                                          <label for="minimal-radio-2">Female</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
						     <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Age of Pet </label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input type="radio" id="3" name="pet_age" value="less_than_3_month" required @if($Post->pet_age == 'less_than_3_month') checked @endif>
                                          <label  for="3months"> Less than 3 months</label>
                                       </li>
                                       <li>
                                          <input type="radio" id="6" name="pet_age" value="less_than_6_month" required  @if($Post->pet_age == 'less_than_6_month') checked @endif>
                                          <label for="6months">Less than 6 Months</label>
                                       </li>
                                       <li>
                                          <input type="radio" id="12" name="pet_age" value="less_than_1_year" required @if($Post->pet_age == 'less_than_1_year') checked @endif>
                                          <label for="1year">Less than 1 Year</label>
                                       </li>
                                       <li>
                                          <input type="radio" id="1plus" name="pet_age"  value="more_than_1_year" required @if($Post->pet_age == 'more_than_1_year') checked @endif>
                                          <label for="1plus">1 Year Plus</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Mobile Number</label>
                                 <input class="form-control" placeholder="eg 76966612345" type="tel" name="mobile" required maxlength="10" minlength="10" value="{{$Post->mobile}}">
                              </div>
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">State</label>
                                <select class="category form-control" name="state_id" required>
                                    <option label="Select Option"></option>
                                    @foreach($States as $state)
                                       <option value="{{$state->id}}" @if($Post->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">City</label>
                                <select  name="city_id" class="category form-control" required>
                                    <option label="Select Option"></option>
                                    @foreach($City as $city)
                                       <option value="{{$city->id}}" @if($Post->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <input  name="update_expiry" type="checkbox" value="Y"> &nbsp;Update Expiry Date
                              </div>
                              
                           </div>

                           <button class="btn btn-theme pull-right">Publish My Ad</button>
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
@section('script')
      <script src="{{URL::to('js/ckeditor/ckeditor.js?v='.rand())}}" ></script>
      <script src="{{URL::to('js/jquery.tagsinput.min.js?v='.rand())}}"></script>
      <script src="{{URL::to('js/dropzone.js?v='.rand())}}" ></script>
      <script src="{{URL::to('js/form-dropzone.js?v='.rand())}}" ></script>
      <script type="text/javascript">
	   "use strict";
	   
	   /*--------- Textarea Ck Editor --------*/
      $(function(){
         CKEDITOR.replace( 'desc' );
      })
	    
		 
	   /*--------- Ad Tags --------*/ 
		 $('#tags').tagsInput({
   			'width':'100%'
		 });
	   
         /*--------- create remove function in dropzone --------*/
         Dropzone.autoDiscover = false;
         var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
         var fileList = new Array;
         var i = 0;
         $("#dropzone").dropzone({
           addRemoveLinks: true,
           maxFiles: 5, //change limit as per your requirements
           acceptedFiles: '.jpeg,.jpg,.png,.gif',
           dictMaxFilesExceeded: "Maximum upload limit reached",
           acceptedFiles: acceptedFileTypes,
           url: "{{route('user.ad.photos.uploads')}}",
           dictInvalidFileType: "upload only JPG/PNG",
           init: function () {
               // Hack: Add the dropzone class to the element
               $(this.element).addClass("dropzone");

               this.on("success", function (file, res) {
                  console.log(res);
                  fileList[i] = {
                     "serverFileID": res.id,
                     "fileName": file.name,
                     "fileId": res.id
                  };
                  $('.dz-message').show();
                  i += 1;

                  let _ar = $('[name="attachment_ids"]').val();
                  $('[name="attachment_ids"]').val(_ar+res.id+',');
          });
        this.on("removedfile", function (file) {
           var rmvFile = "";
            for (var f = 0; f < fileList.length; f++) {
                if (fileList[f].fileName == file.name) {
                    rmvFile = fileList[f].serverFileID;
                }
            }

            if (rmvFile) {
                  $.ajax({
                     url: "{{route('user.ad.photos.delete')}}", //your php file path to remove specified image
                     type: "POST",
                     data: { serverFileID: rmvFile},
                  });
               }
          });
           }
         });
		 (jQuery);
      </script>




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


$(function(){
   $('[name="attachment_ids"]').val("")
})

$('.delete_file').click(function(e){
    e.preventDefault();
    if(confirm("Are You sure you wants to delete This image")){
       let id = $('.delete_file').data('id')
       let post_id = $('.delete_file').data('post_id');
        if(id == 'undefined' || id == '' ||post_id == '' || post_id == 'undefined'){
            toastr.warning("There is some error please contact to admin");
            return;
        }

        let formdata = new FormData();
        formdata.append('id',id);
        formdata.append('post_id',post_id);
        formdata.append('edit',true);
           KennelPost({
              url : "{{route('user.ad.photos.delete')}}",
              data:formdata,
              function_type:'FORM_SAVE',
              method : 'POST',
              dataType : 'JSON'
            });
        $(this).parent().remove();
    }
})

$('[name="pet_id"]').on('change', function(e){
      e.preventDefault();

    let pet_id = $(this).val();
    if(pet_id == '' || typeof pet_id == null){
      toastr.error(`Please select PET`);
      return ;
    }


    let response = KennelPost({
              data:{
                  'pet_id':pet_id
              },
              function_type:'AJAX_DATA',
              type : 'GET_BREADS',
              method : 'POST',
              dataType : 'JSON'
            });
     
     if(response.status == 200){
        $('[name="bread_id"]').html(response.data);
     }else{
      toastr.warning(response.Message);
     }

});



</script>
      <!-- JS -->
      @endsection