<?php

namespace App\Http\Controllers;

use App\Notifications\DbStoreNotification;
use Notification;
use Illuminate\Http\Request;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use App\Models\Member;
use App\Models\Package;
use App\Models\Paytm;
use App\Models\Wallet;
use App\Models\User;
use Auth;
use Session;
use App\Models\Post;

class PackagePaymentController extends Controller
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
        $per_page            = 10;
        $package_payments    = Paytm::latest()->paginate($per_page);
        return view('admin.package_payments.index', compact('package_payments','per_page'));
    }


    public function show($id)
    {
      $package_payment    = Paytm::findOrFail($id);
      return view('admin.package_payments.payment_details', compact('package_payment'));
    }

    public function manual_payment_accept($id)
    {
      $package_payment      = Paytm::find($id);
      if(!$package_payment){
        flash(translate('No Record found.'))->error();
        return back();
      }
      
      $Post = Post::where('order_id', $package_payment->order_id)->first();
      if(!$Post){
        flash(translate('No Record found.'))->error();
        return back();
      }

      $package_payment->status = '1';
      $package_payment->save();
      $Post->expiry = date('Y-m-d H:i:s', strtotime('+1 month'));
      $Post->status = 'publish';
      $Post->save();
       
      flash(translate('Payment Updated Successfully'))->success();
      return back();
    }
}
