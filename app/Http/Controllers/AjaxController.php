<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\City;
use GuzzleHttp\Psr7\Response as Psr7Response;
use LDAP\Result;
use App\Models\PetBread;

class AjaxController extends Controller
{
    public function index(Request $request){
        switch($request->type){
            case 'GET_CITY':
                  return $this->getCity($request->postdata);  
            break;

            case 'GET_BREADS':
                return $this->getBREADS($request->postdata);  
            break;
            
            default:
            return Response::json(["status"=>500,"message"=>"Invalid Request"]);
            break;
        }
    }

    public function getCity($postdata){
        $state_id = $postdata['state_id'];
        $Cities = City::where('state_id',$state_id)->get();
        $return = '<option>Please select</option>';
        foreach($Cities as $city){
            $return.= "<option value='$city->id'>$city->name</option>";
        }
        return Response::json(["status"=>200,"data"=>$return]);
    }

    public function getBREADS($postdata){
        $pet_id = $postdata['pet_id'];
        $Cities = PetBread::where('pet_id',$pet_id)->get();
        $return = '<option>Please select</option>';
        foreach($Cities as $city){
            $return.= "<option value='$city->id'>$city->breads_name</option>";
        }
        return Response::json(["status"=>200,"data"=>$return]);
    }
    
}
