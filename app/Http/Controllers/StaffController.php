<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use Auth;
class StaffController extends Controller
{
    public function __construct()
    {
      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::latest()->where('id','!=',Auth::user()->id)->paginate(10);
        return view('admin.staff.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.staff.staffs.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->email)->first() == null){
            $user             = new User;
            $user->name       = $request->name;
            $user->email      = $request->email;
            $user->phone      = $request->mobile;
            $user->password   = Hash::make($request->password);
            if($user->save()){
                $user->assignRole(Role::findOrFail($request->role_id)->name);
                flash(translate('User has been inserted successfully'))->success();
                    return redirect()->route('staffs.index');
            }else{
                flash(translate('There is some error , Please contact to admin`'))->error();
                return back();
            }
        }

        flash(translate('Email already used'))->error();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::findOrFail(decrypt($id));
        $roles = Role::latest()->get();
        return view('admin.staff.staffs.edit', compact('staff','roles'));
    }
    
    public function update(Request $request, $id)
    {
       
        //pr($request->all());
        $staff            = User::findOrFail($id);
        $user             = $staff;
        $user->name       = @$request->name;
        $user->email      = @$request->email;
        $user->mobile      = @$request->mobile;
        $user->status      = @$request->status;
        if(strlen($request->password) > 0){
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            $user->assignRole(Role::findOrFail($request->role_id)->name);
            if($staff->save()){
                flash(translate('User has been updated successfully'))->success();
                return redirect()->route('staffs.index');
            }
        }

        flash(translate('Something went wrong'))->error();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy(User::findOrFail($id)->user->id);
        if(User::destroy($id)){
            flash(translate('User has been deleted successfully'))->success();
            return redirect()->route('staffs.index');
        }

        flash(translate('Something went wrong'))->error();
        return back();
    }
}
