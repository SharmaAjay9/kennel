    <!-- Footer Content -->
    <footer>
            <div class="footer-top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Info Widget -->
                        <div class="widget">
                           <div class="logo">
                               <img alt="" src="{{uploaded_asset(get_setting('footer_logo'))}}"> 
                              </div>
                           <p>
                              {!!get_setting('about_us_description')!!}
                           </p>
                           <ul>
                              <li>
                                 <a href="{{get_setting('footer_play_store_link')}}"><img src="{{uploaded_asset(get_setting('footer_play_store_img'))}}" alt=""></a>
                              </li>
                              <li>
                                 <a href="{{get_setting('footer_app_store_link')}}"><img src="{{uploaded_asset(get_setting('footer_app_store_img'))}}" alt=""></a>
                              </li>
                              
                           </ul>
                        </div>
                        <!-- Info Widget Exit -->
                     </div>
                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Follow Us -->
                        <div class="widget socail-icons">
                           <h5>Follow Us</h5>
                           <ul>
                              <li><a class="fb" href="{{get_setting('facebook_link')}}"><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
                              <li><a class="twitter" href="{{get_setting('twitter_link')}}"><i class="fa fa-twitter"></i></a><span>Twitter</span></li>
                              <li><a class="linkedin" href="{{get_setting('linkedin_link')}}"><i class="fa fa-linkedin"></i></a><span>Linkedin</span></li>
                              <li><a class="googleplus" href="{{get_setting('instagram_link')}}"><i class="fa fa-instagram"></i></a><span>Instagram</span></li>
                           </ul>
                        </div>
                        <!-- Follow Us End -->
                     </div>


                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Follow Us -->
                        <div class="widget socail-icons">
                           <h5> {{get_setting('widget_one_title')}}</h5>
                            <ol>
                           @foreach (json_decode( get_setting('widget_one_labels'), true) as $key => $value)
                            <li class="my-3">
                                <a style="border:none !important;background: none;" href="{{ json_decode( get_setting('widget_one_links'), true)[$key] }}" class="text-reset opacity-60">{{ $value }}</a>
                            </li>
                           @endforeach
                  </ol>
                        </div>
                        <!-- Follow Us End -->
                     </div>


                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Follow Us -->
                        <div class="widget socail-icons">
                           <h5> {{ translate('Contacts') }}</h5>
                           <ul>


                           <li><a class="fb" href="javascript:void(0)"><i class="fa fa-address-book-o"></i></a><span>{{get_setting('footer_address')}}</span></li>
                           <li><a class="fb" href="javascript:void(0)"><i class="fa fa-globe"></i></a><span>{{get_setting('footer_website')}}</span></li>
                           <li><a class="fb" href="javascript:void(0)"><i class="fa fa-envelope"></i></a><span>{{get_setting('footer_email')}}</span></li>
                           <li><a class="fb" href="javascript:void(0)"><i class="fa fa-phone"></i></a><span>{{implode(',',json_decode(get_setting('footer_phones')))}}</span></li>

                           </ul>
                        </div>
                        <!-- Follow Us End -->
                     </div>



                     <!-- <div class="col-md-3  col-sm-6 col-xs-12"> -->
                      
                        <!-- <div class="widget widget-newsletter">
                           <h5>Get pet care and training tips via email. Its Free!</h5>
                           <div class="fieldset">
                              <p>As a pet parent, you want to do everything you can to care for your pet; this involves regular, everyday activities to ensure they stay happy and healthy. We are here to provide you with advice and support vis mails.</p>
                              <form>
                                 <input class="" value="Enter your email address" type="text">
                                 <input class="submit-btn" name="submit" value="Submit" type="submit"> 
                              </form>
                           </div>
                        </div> -->
                       
                     <!-- </div> -->
                  </div>
               </div>
            </div>
            <!-- Copyrights -->
            <div class="copyrights">
               <div class="container">
                  <div class="copyright-content">
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <p>{!!get_setting('footer_copyright_text')!!}  </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- Main Content Area End --> 
      <!-- Post Ad Sticky -->
      <a href="@auth {{route('user.store.post-ad')}} @else {{route('login')}} @endauth" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9"></i>
         </span>
         <h4>SELL</h4>
      </a>
      <!-- Back To Top -->
      <a href="#0" class="cd-top">Top</a>
      <script src="{{URL::to('js/jquery.min.js?v='.rand())}}"></script>
      <script src="{{URL::to('js/bootstrap.min.js?v='.rand())}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="{{URL::to('js/custom.js?v='.rand())}}"></script>


      <script>
          var site_url = "{{URL::to('/')}}/";
          var current_url = "{{url()->current()}}/";
      </script>
      <script src="{{URL::to('js/main.js?v='.rand())}}"></script>

      @yield('script')

    
    <script>
       @if(session()->has('status'))
         @if(session()->get('status') == false)
            toastr.error("{{session()->get('message')}}");
         @else
            toastr.success("{{session()->get('message')}}");
         @endif
       @endif
    </script>
      
   </body>
</html>