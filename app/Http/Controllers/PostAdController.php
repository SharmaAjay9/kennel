<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\States;
use App\Models\Pet;
use App\Models\PetBread;
use App\Models\Post;
use App\Models\PostAttachment;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Paytm;
use App\Models\PaymentHistory;

class PostAdController extends Controller
{
    public function index(Request $request){

    }

    public function store(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $attachment_ids = explode(',',$data['attachment_ids']);
            $attachment_ids = array_filter($attachment_ids);
            try{
                
                $Post = new Post();
                $Post->ad_type = $data['ad_type'];
                $Post->title = $data['title'];
                $Post->price = $data['price'];
                $Post->desc = $data['desc'];
                $Post->pet_gender = $data['pet_gender'];
                $Post->pet_age = $data['pet_age'];
                $Post->mobile = $data['mobile'];
                $Post->status = 'draft';
                $Post->pet_id = $data['pet_id'];
                $Post->bread_id = $data['bread_id'];
                $Post->state_id = $data['state_id'];
                $Post->city_id = $data['city_id'];
                $Post->user_id = Auth::user()->id;
                $Post->expiry = date('Y-m-d H:i:s', strtotime('+1 month'));
                $Post->amount = env('ADS_FEE');
                $Post->save();

                if(!empty($attachment_ids)){
                    PostAttachment::whereIn('id',$attachment_ids)->update(["post_id"=>$Post->id]);
                }
                
                return view('paytm',['ad_id'=>$Post->id,'ad_amount'=>$Post->amount])->with(["status"=>true,"message"=>"Post saved as Draft"]);

               // return back()->with(["status"=>true,"message"=>"Post Added Successfully"]);
            }catch(\Exception $e){
               // print_r($e->getMessage());die;
                foreach( $attachment_ids as $ID){
                    $res = PostAttachment::find($ID);
                    if($res){
                        $path = $res->path;
                        Storage::disk('local')->delete($path);
                        PostAttachment::where('id',$ID)->delete();
                    }
                }
                return back()->with(["status"=>false,"message"=>"Oops There is some error please contact to admin"]);
            }
            
        }else{

            $States = States::where('country_id',101)->get();
            $Pet = Pet::all();
            $page = "Ad Post";
           return view('user.post-ad',compact('States','Pet',"page")); 
        }
    }

    public function update(Request $request,$id){

            $Post = Post::where('id',$id)
                    ->where('user_id',Auth::user()->id)
                    ->first();

            if(!$Post){
                abort(404,"Invalid Request, No Record found");
            }
            if($request->isMethod('post')){
                
                $data = $request->all();
               
                $attachment_ids = explode(',',$data['attachment_ids']);
                $attachment_ids = array_filter($attachment_ids);
                try{
                    
                    $Post->ad_type = $data['ad_type'];
                    $Post->title = $data['title'];
                    $Post->price = $data['price'];
                    $Post->desc = $data['desc'];
                    $Post->pet_gender = $data['pet_gender'];
                    $Post->pet_age = $data['pet_age'];
                    $Post->mobile = $data['mobile'];
                    $Post->status = 'draft';
                    $Post->pet_id = $data['pet_id'];
                    $Post->bread_id = $data['bread_id'];
                    $Post->state_id = $data['state_id'];
                    $Post->city_id = $data['city_id'];
                    $Post->user_id = Auth::user()->id;
                    $Post->amount = env('ADS_UPDATE_FEE');
                    if(@$data['update_expiry']){
                        $Post->expiry = date('Y-m-d H:i:s',(strtotime('next month',strtotime(date($Post->expiry)))));
                        $Post->amount = env('ADS_FEE');
                    }
                    $Post->save();
                    
                    if(!empty($attachment_ids)){
                        PostAttachment::whereIn('id',$attachment_ids)->update(["post_id"=>$Post->id]);
                    }

                    //if(@$data['update_expiry']){
                        return view('paytm',['ad_id'=>$Post->id,'ad_amount'=>$Post->amount])->with(["status"=>true,"message"=>"For upgrade post expiry please pay again"]);
                    //}
                    
                    return back()->with(["status"=>true,"message"=>"Post Updated Successfully"]);
                }catch(\Exception $e){
                // print_r($e->getMessage());die;
                    foreach( $attachment_ids as $ID){
                        $res = PostAttachment::find($ID);
                        if($res){
                            $path = $res->path;
                            Storage::disk('local')->delete($path);
                            PostAttachment::where('id',$ID)->delete();
                        }
                    }
                    return back()->with(["status"=>false,"message"=>"Oops There is some error please contact to admin"]);
                }
            }else{
                $States = States::where('country_id',101)->get();
                $Pet = Pet::all();
                $page = "Edit Ad Post : ".@$Post->title;
                $PetBread = PetBread::where('pet_id',$Post->pet_id)->get();
                $City = City::where('state_id',$Post->state_id)->get();
                
                return view('user.edit-ad',compact('States','Pet',"page","Post",'PetBread','City')); 
            }
    }


    public function addPhotos(Request $request){
        $user_id = Auth::user()->id;
        $file_path = 'public/ad_attachment/'.$user_id;
        $path = $request->file('file')->store($file_path);
        $PostAttachment = new PostAttachment();
        $PostAttachment->path  = $path;
        $PostAttachment->save();

        return response()->json(['status'=>200,"id"=>$PostAttachment->id]);
     
    }
    public function deletePhotos(Request $request){
        return response()->json(['status'=>200,"message"=>"Deleted successfully","reload"=>false]);
        if($request->edit){
            $ID = $request->id;
            $res = PostAttachment::where('id',$ID)->where('post_id',$request->post_id)->first();
        }else{
            $ID = $request->serverFileID;
            $res = PostAttachment::find($ID);
        }
        
        if($res){
            $path = $res->path;
            Storage::disk('local')->delete($path);
            PostAttachment::where('id',$ID)->delete();
            return response()->json(['status'=>200,"message"=>"Deleted successfully","reload"=>false]);
        }else{
            return response()->json(['status'=>400,"message"=>"No Data Found"]);
        }  
    }


    public function listAds(Request $request,$type){

        $Posts = Post::query();
        switch($type){
            case 'active':
                $Posts = $Posts->where('expiry','>=',date('Y-m-d H:i:s'))
                              ->where('status','publish');
            break;
            case 'expired':
                $Posts = $Posts->where('expiry','<',date('Y-m-d H:i:s'));
            break;
            case 'draft':
                $Posts = $Posts->where('status','draft');
            break;
            default:
                $Posts = $Posts->where('expiry','>=',date('Y-m-d H:i:s'))
                              ->where('status','publish');
            break;
        }
        $search = @$request->search ? @$request->search : '';
        if(@$search != ''){
            $Posts->where(function($query) use($search){
                    return $query->orWhere('title','like',"%$search%")
                            ->orWhere('ad_type','like',"%$search%")
                            ->orWhere('price','like',"%$search%")
                            ->orWhere('desc','like',"%$search%");
            });
            
        }
        

        $Posts = $Posts->where('user_id',Auth::user()->id);
        $Posts = $Posts->orderBy('id','desc');
        $Posts = $Posts->paginate(5);
        $page = Ucfirst(@$type)." Ads";
        return view('user.list-ads',compact('Posts','type','page','search'));
    }


    public function pay(Request $request)
    {

        $request->validate([
            'ad_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required'],
            'mobile'=>['required','min:10','max:13']
        ]);

        $Post = Post::find($request->ad_id);
        if(!$Post){
            return back()->with("status",false)->with('message','Oops! No record found');
        }

        $amount =  $Post->amount ? $Post->amount : env('ADS_FEE') ; //Amount to be paid

        if(!is_numeric($amount)){
            $amount = env('ADS_FEE');
        }

        $userData = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email, 
            'fee' => $amount,
            'order_id' => $request->mobile."_".rand(1,1000) 
        ];

        $paytmuser = Paytm::create($userData);

        $Post->order_id = $userData['order_id'];
        $Post->save();

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $userData['order_id'], 
            'user' => $paytmuser->id,
            'mobile_number' => $userData['mobile'],
            'email' => $userData['email'],
            'amount' => $amount,
            'callback_url' => route('user.payment.status')
        ]);
        return $payment->receive();
    }


    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        $order_id = $transaction->getOrderId(); // return a order id
        $Paytm = Paytm::where('order_id', $order_id)->first();
        $Post = Post::where('order_id', $order_id)->first();
        if(in_array($Paytm->status,[1,2])){
            abort(500,"This Transaction is already processed");
        }
        $transaction_id = $transaction->getTransactionId();

        PaymentHistory::create([
            "post_id"=>$Post->id,
            "paytm_id"=>$Paytm->id,
            "amount"=>$Post->amount
        ]);
        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            $Paytm->status = 1;
            $Paytm->transaction_id = $transaction_id;
            $Paytm->save();

            $Post->payment_status = 'success';
            $Post->status = 'publish';
            $Post->save();
            $payment_status = 'success';

            $status = true;
            $message =  "Your payment is successfull.";

        } else if ($transaction->isFailed()) {
            $Paytm->status = 0;
            $Paytm->transaction_id = $transaction_id;
            $Paytm->save();
            
            $Post->payment_status = 'failed';
            $Post->status = 'draft';
            $Post->save();
            $payment_status = 'failed';

            $status = false;
            $message =  "Your payment is failed";
            
        } else if ($transaction->isOpen()) {
            $Paytm->status = 2;
            $Paytm->transaction_id = $transaction_id;
            $Paytm->save();

            $Post->payment_status = 'processing';
            $Post->status = 'draft';
            $Post->save();
            $payment_status = 'processing';
            
            $status = true;
            $message =  "Your payment is processing.";
        }
        $date = $Paytm->update_at;
       // $transaction->getResponseMessage();
        return view('payment-res',
        compact('payment_status','order_id','transaction_id','date'))
        ->with('status',@$status)->with("message",@$message);
    }    
}
