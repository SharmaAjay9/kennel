<div class="user-profile">
    @if(Auth::user()->image != '')
                 @if(strpos(Auth::user()->image,'public')  !== false)
                    <img src="{{asset('storage'.str_replace('public','',Auth::user()->image))}}" alt="img">
                @else
                <img src="{{Auth::user()->image}}" alt="">
                @endif
    @endif



<div class="profile-detail">
    <h6>{{@Auth::user()->name}}</h6>
    <ul class="contact-details">
        
        <li>
            <i class="fa fa-envelope"></i>{{Auth::user()->email}}
        </li>
        <li>
            <i class="fa fa-phone"></i> {{Auth::user()->mobile}}
        </li>
    </ul>
</div>
<ul>
<li><a href="{{route('user.view.profile',['id'=>base64_encode(Auth::user()->id)])}}">User Profile</a></li>
    <li><a href="javascript:void(0)">My Total Ads <span class="badge">{{Auth::user()->posts->count()}}</span></a></li>
    <li @if(@$type == 'active') class="active" @endif><a href="{{route('user.list.ads',['type'=>'active'])}}">Active Ads <span class="badge">{{Auth::user()->posts->where('expiry','>',date('Y-m-d H:i:s'))->where('status','publish')->count()}}</span></a></li>
    <li @if(@$type == 'expired') class="active" @endif><a href="{{route('user.list.ads',['type'=>'expired'])}}">Expired Ads <span class="badge">{{Auth::user()->posts->where('expiry','<',date('Y-m-d H:i:s'))->count()}}</span></a></li>
    <li @if(@$type == 'draft') class="active" @endif><a href="{{route('user.list.ads',['type'=>'draft'])}}">Draft Ads  <span class="badge">{{Auth::user()->posts->where('status','draft')->count()}}</span></a></li>
    <li>
        <a  href="javascript:void(0)"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    </li>
</ul>
</div>