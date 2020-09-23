<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\ContactUs;
use Mail; 
use App\Mail\ContactUsMail;
use App\Risk;
use Illuminate\Http\Request;

class RisksController extends Controller
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

    public function saverisk()
    {
        $workflow_id = $this->request->workflow_id;
        $riskprobability = $this->request->riskprobability;
        $riskbusinessimpact = $this->request->riskbusinessimpact;
        $riskimpactscore = $this->request->riskimpactscore;
        $riskdescription = $this->request->riskdescription;
        $riskpreventive = $this->request->riskpreventive;
        $riskmitigation = $this->request->riskmitigation;        
        $user_id = $this->request->user_id;
        $risk_id = $this->request->risk_id; 
        $ids = [];   
       

        foreach($riskprobability as $key => $value){
           
            $data = [
                'user_id'=>$user_id,
                'workflow_id'=>$workflow_id,
                'riskprobability'=>$value,
                'riskbusinessimpact'=>$riskbusinessimpact[$key],
                'riskimpactscore'=>$riskimpactscore[$key],
                'riskdescription'=>$riskdescription[$key],
                'riskpreventive'=>$riskpreventive[$key],
                'riskmitigation'=>$riskmitigation[$key],
                
            ];
            if($risk_id[$key] != "" && $risk_id[$key] != null)
            {   
                $saveRisk = Risk::where('id', '=', $risk_id[$key])->update($data);
                array_push($ids,$risk_id[$key]);
            }
            else
            { 
                $saveRisk =   Risk::create($data);
                array_push($ids,$saveRisk->id);
            }
        }
        if($saveRisk)
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
    public function deleterisk(Request $request){

        $id = $request['id'];

        $deletewflow = Risk::where('id', '=', $id)->delete();
         //if ($deletewflow) {  
            return response()->json([
                "status"  =>  "success",
            ]);
       /// } else {
        
    }


    
}
