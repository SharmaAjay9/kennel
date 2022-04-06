<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-xl-none d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
        <div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
            <a href="{{ route('admin.dashboard') }}" class="d-block">
                <img src="{{uploaded_asset(get_setting('system_logo'))}}" class="img-fluid">
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
              <div class="aiz-topbar-item">
                  <div class="d-flex align-items-center">
                      <a class="btn btn-icon btn-circle btn-light" href="{{ route('home')}}" target="_blank" title="{{ translate('Browse Website') }}">
                          <i class="las la-globe"></i>
                      </a>
                  </div>
              </div>
          </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
        
            {{-- language --}}
            @php
                if(Session::has('locale')){
                    $locale = Session::get('locale', Config::get('app.locale'));
                }
                else{
                    $locale = env('DEFAULT_LANGUAGE');
                }
            @endphp
           
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="mr-md-2">
                           
                                <img src="{{ asset('storage'.str_replace('public','',Auth::user()->image)) }}" class="size-35px rounded-circle img-fit" height="36" width="36" onerror="this.onerror=null;this.src='{{ asset('assets/img/avatar-place.png') }}';">
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{Auth::user()->name}}</span>
                                <span class="d-block small opacity-60">
                                    @foreach(Auth::user()->getRoleNames() as $r)
                                        @if($loop->last)
                                            {{Ucfirst($r)}} 
                                        @else 
                                        {{Ucfirst($r)}} ,
                                        @endif
                                    @endforeach
                                    
                                </span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="{{ route('profile.index')}}" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>{{translate('Manage Profile')}}</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="las la-sign-out-alt"></i>
                            <span>{{translate('Logout')}}</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
