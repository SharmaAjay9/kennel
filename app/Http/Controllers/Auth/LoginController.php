<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        $page = 'Login';

        return view('auth.login', compact('page'));
    }

    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }



    public function authenticated()
    {
        if(auth()->user()->hasRole(['admin','super-admin'])){
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->route('/');
        }
        
    }





    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users  = User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);
            return redirect('/');
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]); 
            $user->assignRole(['user']);   
            Auth::login($user);
            return redirect()->route('home');
        }
    }
    
}
