<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use Redirect;
use Validator;


class PackageController extends Controller
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
     // $packages      = Package::paginate(10);
        $packages = [];
      return view('admin.premium_packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.premium_packages.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       
        $type = base64_decode($id);
        return view('admin.premium_packages.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $id = base64_decode($id);
        $this->overWriteEnvFile($id,$request->price);
         flash(translate('Package info has been updated successfully'))->success();
         return back();
    }

    public function overWriteEnvFile($type, $val)
     {
         $path = base_path('.env');

         if (file_exists($path)) {
             $val = '"' . trim($val) . '"';
             if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
              file_put_contents($path, str_replace(
                     $type . '="' . env($type) . '"', $type . '=' . $val, file_get_contents($path)
                 ));

             } else {
                 file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
             }
         }
     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Package::destroy($id)){
            flash(translate('Package info has been deleted successfully'))->success();
            return redirect()->route('packages.index');
        }
        else {
            flash(translate('Sorry! Something went wrong.'))->error();
            return back();
        }
    }

}
