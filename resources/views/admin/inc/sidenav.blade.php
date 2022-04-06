<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block">
                <img src="{{uploaded_asset(get_setting('system_logo'))}}" class="img-fluid">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>

                
                <!-- Premium Packages -->
              
                <li class="aiz-side-nav-item">
                    <a href="{{ route('packages.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['packages.create','packages.edit']) }}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Premium Packages')}}</span>
                    </a>
                </li>
            
                <!-- Earnings -->
             
                <li class="aiz-side-nav-item ">
                    <a href="{{ route('package-payments.index') }}" class="aiz-side-nav-link">
                        <i class="las la-money-bill-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Package Payments')}}</span>
                    </a>
                </li>
           

            
                <!-- Messaging -->
          
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-envelope aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Marketing')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('newsletters.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Newsletter')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
             

               

                <!-- Support Ticket Addon -->
               

               

                <!-- Uploader Manage -->
             
                <li class="aiz-side-nav-item">
                    <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                    </a>
                </li>
              

                <!-- Website Setup -->
             
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                           
                            
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('website.footer_settings')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                                    </a>
                                </li>
                          
                        
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('custom-pages.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                                    </a>
                                </li>
                          
                               
                         
                        </ul>
                    </li>
             


                <!-- General settings -->
              
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-cog aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Settings')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                        
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('general_settings') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('General Settings')}}</span>
                                    </a>
                                </li>
                          
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('smtp_settings') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('SMTP Settings')}}</span>
                                    </a>
                                </li>
                         
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('email-templates.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Email Templates')}}</span>
                                    </a>
                                </li>
                       
                       
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('social_media_login') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Social Media Login')}}</span>
                                    </a>
                                </li>
                         
                        </ul>
                    </li>
              

                <!-- Staff -->
               
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Users')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                          
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                                    <span class="aiz-side-nav-text">{{translate('All Users')}}</span>
                                </a>
                            </li>
                        
                          
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('roles.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                                    <span class="aiz-side-nav-text">{{translate('Staff Roles')}}</span>
                                </a>
                            </li>
                      
                        </ul>
                    </li>
               
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('System')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                          <li class="aiz-side-nav-item">
                                <a href="{{route('system_server')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{translate('Server status')}}</span>
                                </a>
                            </li>
                        
                        </ul>
                    </li>    
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
