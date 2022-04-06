<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\States;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Hash;

class ProfileController extends Controller
{
    public function index(Request $request,$id){
        if(Auth::user()->hasRole(['admin', 'super-admin'])){
            $id = base64_decode($id);
            $User = User::find($id);
        }else{
            $User = Auth::user();
        }
        if(!$User){
            abort(500,"Invalid Request");
        }
        $page = "Profile";
        $States = States::where('country_id',101)->get();
        $City = City::where('state_id',$User->state_id)->get();
        return view('user.profile',compact('User','page',"States","City"));
    }

    public function update(Request $request,$id){
        
        if(Auth::user()->hasRole(['admin', 'super-admin'])){
            $id = base64_decode($id);
            $User = User::find($id);
        }else{
            $User = Auth::user();
        }
        if(!$User){
            abort(500,"Invalid Request");
        }
        $data = $request->all();
        //dd($data);
        $User->name =  $data['name'];
        $User->email =  $data['email'];
        $User->mobile =  $data['mobile'];
        $User->state_id =  $data['state_id'];
        $User->city_id =  $data['city_id'];
        $User->desc =  $data['desc'];

        if( $request->hasFile('image')){
            $old_image = $User->image; 
            $User = Auth::user();
            $file_path = 'public/profile/'.$User->id;
            $path = $request->file('image')->store($file_path);
            $User->image =  $path;

            if($old_image != ''):
                    Storage::disk('local')->delete($old_image);
            endif;

        }
        
        if($User->profile_name != $data['profile_name']){
            $UserDet = User::where('profile_name',$data['profile_name'])->first();
            if($UserDet){
                return back()->with("status",false)->with("message","Profile Name already exist on , please try another");
            }  
        }
        $User->profile_name = str_replace(" ","_",$data['profile_name']);
        
        
        if($User->save()){
            return back()->with("status",true)->with("message","Detail Update Successfully");
        }else{
            return back()->with("status",false)->with("message","Oops! There is some error please try again");
        }
        

    }

    public function updatePassword(Request $request,$id){
        if(Auth::user()->hasRole(['admin', 'super-admin'])){
            $id = base64_decode($id);
            $User = User::find($id);
        }else{
            $User = Auth::user();
        }
        if(!$User){
            abort(500,"Invalid Request");
        }

        $data = $request->all();
        if(!Hash::check($data['old_password'], $User->password)){
            return back()->with("status",false)->with("message","Old Password does not match with current password");
        }

        if($data['password'] != $data['confirm_password']){
            return back()->with("status",false)->with("message","New Password and Confirm new password does not match");
        }
        $User->password = Hash::make($data['password']);
        
        if($User->save()){
            return back()->with("status",true)->with("message","Password Updated Successfully");
        }else{
            return back()->with("status",false)->with("message","Oops! There is some error please try again");
        }
        

        

       // old_password
    }
}
