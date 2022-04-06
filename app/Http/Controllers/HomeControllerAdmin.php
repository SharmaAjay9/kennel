<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use Auth;
use App\Models\User;


class HomeControllerAdmin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function admin_login()
    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff'))
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return view("auth_admin.login");
        }

    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }


    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

   

    
    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_USERNAME');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback').'?new_email_verificiation_code='.$verification_code.'&email='.$email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");

        } catch (\Exception $e) {
            return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

   

    public function reset_password_with_code(Request $request){
        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                auth()->login($user, true);

                flash(translate('Password updated successfully'))->success();

                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
                {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        }
        else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }


}
