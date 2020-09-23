<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\ContactUs;
use Mail; 
use App\Mail\ContactUsMail;
use App\Negotiate;
use Illuminate\Http\Request;
use App\Offers;
use Auth;
class NegotiationsController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
    }


    /**
    * SAve Risk form data 
    * @param 
    * @return Save risk data
    * Created By: Nishant Kumar
    * Created At: 09 Jan 2020 
    */

    public function savenegotiations()
    {
        //echo "<pre>"; print_r($this->request->all()); exit;
        $take_negotiate1 = $this->request->take_negotiate1;
        $take_negotiate2 = $this->request->take_negotiate2;
        $take_negotiate3 = $this->request->take_negotiate3;
        $take_negotiate4 = $this->request->take_negotiate4;
        $take_negotiate5 = $this->request->take_negotiate5;
        $take_negotiate6 = $this->request->take_negotiate6;
        $give_negotiate1 = $this->request->give_negotiate1;              
        $give_negotiate2 = $this->request->give_negotiate2;              
        $give_negotiate3 = $this->request->give_negotiate3;              
        $give_negotiate4 = $this->request->give_negotiate4;              
        $give_negotiate5 = $this->request->give_negotiate5;              
        $give_negotiate6 = $this->request->give_negotiate6;              
        $user_id = $this->request->user_id;
        $workflow_id = $this->request->workflow_id;
        $negotiate_id = $this->request->negotiate_id;    
        $ids = [];    
        
        foreach($take_negotiate1 as $key => $value){
            $data = [
                'user_id'=>$user_id,
                'workflow_id'=>$workflow_id,
                'take1'=>$value,                
                'take2'=>$take_negotiate2[$key],                
                'take3'=>$take_negotiate3[$key],                
                'take4'=>$take_negotiate4[$key],                
                'take5'=>$take_negotiate5[$key],                
                'take6'=>$take_negotiate6[$key],                
                'give1'=>$give_negotiate1[$key],
                'give2'=>$give_negotiate2[$key],
                'give3'=>$give_negotiate3[$key],
                'give4'=>$give_negotiate4[$key],    
                'give5'=>$give_negotiate5[$key],
                'give6'=>$give_negotiate6[$key],
                
            ];
            if($negotiate_id[$key] != "" && $negotiate_id[$key] != null)
            {   
                $savenegotiations = Negotiate::where('id', '=', $negotiate_id[$key])->update($data);
                array_push($ids,$negotiate_id[$key]);
            }
            else
            { 
                $savenegotiations =   Negotiate::create($data);
                array_push($ids,$savenegotiations->id);
            }
        }

                $your_offer_data = $this->request->your_data;
                $their_offer_data = $this->request->their_data;
                
                       
                if (sizeof($your_offer_data)>0) {
                    foreach ($your_offer_data as $data) {
                    $aa = Offers::where('id',$data['id'])->where('user_id',Auth::user()->id)->first();
                    if ($aa) {
                        $execute = Offers::find($data['id']);
                        $execute->variables = isset($data['variable']) ? $data['variable'] : null;
                        $execute->status = isset($data['status']) ? $data['status'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->aligned = isset($data['aligned']) ? $data['aligned'] : null;
                        unset($data['variable']);
                        unset($data['aligned']);
                        unset($data['status']);
                        unset($data['id']);
                        $execute->offer = json_encode($data);
                       
                        $length_data =  json_encode($data);
                        $length = count(json_decode($length_data,true));
                        $execute->offer_length = $length;
                        $execute->save();
                        $status = true;
                    } else {
                        $execute = new Offers();
                        $execute->variables = isset($data['variable']) ? $data['variable'] : null;
                        $execute->status = isset($data['status']) ? $data['status'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->aligned = isset($data['aligned']) ? $data['aligned'] : null;
                        unset($data['variable']);
                        unset($data['aligned']);
                        unset($data['status']);
                        unset($data['id']);
                        $execute->offer = json_encode($data);
                        $length_data =  json_encode($data);
                        $length = count(json_decode($length_data,true));
                        $execute->offer_length = $length;
                        $execute->save();
                        $status = true;
                    }
                }
            }
               if (sizeof($their_offer_data)>0) {
                 foreach ($their_offer_data as $data) {
                    $aa = Offers::where('id',$data['id'])->where('user_id',Auth::user()->id)->first();
                    if ($aa) {
                        $execute = Offers::find($data['id']);
                        $execute->variables = isset($data['variable']) ? $data['variable'] : null;
                        $execute->status = isset($data['status']) ? $data['status'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->aligned = isset($data['aligned']) ? $data['aligned'] : null;
                        unset($data['variable']);
                        unset($data['aligned']);
                        unset($data['status']);
                        unset($data['id']);
                        $execute->offer = json_encode($data);
                        $length_data =  json_encode($data);
                        $length = count(json_decode($length_data,true));
                        $execute->offer_length = $length;
                        $execute->save();
                        $status = true;
                    } else {
                        $execute = new Offers();
                        $execute->variables = isset($data['variable']) ? $data['variable'] : null;
                        $execute->status = isset($data['status']) ? $data['status'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->aligned = isset($data['aligned']) ? $data['aligned'] : null;
                        unset($data['variable']);
                        unset($data['aligned']);
                        unset($data['status']);
                        unset($data['id']);
                        $execute->offer = json_encode($data);
                        $length_data =  json_encode($data);
                        $length = count(json_decode($length_data,true));
                        $execute->offer_length = $length;
                        $execute->save();
                        $status = true;
                    }
                }
               }
        if($savenegotiations)
        {
            $result = [
                    'id' => $ids,
                    'success' => 'success',
                ];
            return $result;
        }


       
 
   
    }


  /**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deletenegotiations(Request $request){

        $id = $request['id'];

        $deletewflow = Negotiate::where('id', '=', $id)->delete();
         //if ($deletewflow) {  
            return response()->json([
                "status"  =>  "success",
            ]);
       /// } else {
        
    }
    
   


    
}
