<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\ContactUs;
use Mail; 
use App\Mail\ContactUsMail;
use App\Communication;
use App\ExternalMessage;
use App\InternalMessage;
use App\Question;
use Illuminate\Http\Request;
use Auth;
class CommunicationsController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
}
    /**
    * Comunications Page 
    * @param 
    * @return Comunication view page
    * Created By: Nishant Kumar
    * Created At: 03 Jan 2020 
    */

    public function personalityData(Request $request) {
        try{
            $linkedin_url = $this->request['linkedin_url'];
            
            $url = 'https://api.crystalknows.com/v1/analysis/linkedin/';
            $data = array(            
            'linkedin_url' => $linkedin_url,
            );
            $curl = curl_init();
       
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);      

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            curl_setopt($curl, CURLOPT_POST, true),
            CURLOPT_CUSTOMREQUEST => "POST",
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer fde37b0b12d789c769986f99d7eb9cca",
                "cache-control: no-cache",
                "content-type: multipart/form-data",
                
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        
        print_r($response); exit;
         return $response;
        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile(),
            ], 200);
        }
        return view('pages.comunications');
    }


 /**
     * @Created By Nishant Kumar
     * @Created Date 13 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function storeCommunication(Request $request)
    {

        try{

            if ($request->has('_token')) {   
                $comm_data = $request['key_players'];
                //dd($comm_data);
                foreach ($comm_data as $data) { 
                    $aa = Communication::where('id',$data['id'])->where('user_id',Auth::user()->id)->first();
                    $influenceBy = '';
                    if(isset($data['influenceBy']))
                    {
                        $influenceBy = implode(',', $data['influenceBy']);
                    }
                
                       
                    $key_player = [
                        'user_id' => Auth::user()->id,
                        'workflow_id' => $data['workflow_id'],
                        'who' => isset($data['whoComm']) ? $data['whoComm'] : null,
                        'title' => isset($data['title']) ? $data['title'] : null,
                        'linkedin_url' => isset($data['linkedin']) ? $data['linkedin'] : null,
                        'personality_type' => isset($data['personality']) ? $data['personality'] : null,
                        'decision_maker_check' => isset($data['decisionMaker']) ? $data['decisionMaker'] : null,
                        'decision_maker_type' => isset($data['decisionType']) ? $data['decisionType'] : null,
                        'influence_by' => isset($data['influenceBy']) ? $influenceBy : null,
                        'relation_status' => isset($data['relationStatus']) ? $data['relationStatus'] : null,
                        'rank' => isset($data['rank']) ? $data['rank'] : null,
                        
                    ];
                      
                    if (isset($aa)) { 
                        $response =  Communication::where('id',$data['id'])->update($key_player);                      
                        $status = true;
                    } else {
                        $response= Communication::create($key_player); 
                        $status = true;
                    }
                        
                }
                $ext_msg = $request['ext_msg'];
                foreach ($ext_msg as $data1) {     
                    $ext_data = ExternalMessage::firstOrNew(array('id' => $data1['id']));
                    $ext_data->user_id = Auth::user()->id;
                    $ext_data->workflow_id = $data['workflow_id'];
                    $ext_data->msg = isset($data1['exMsg']) ? $data1['exMsg'] : null;
                    $ext_data->how_to_say = isset($data1['exHowSay']) ? $data1['exHowSay'] : null;
                    $ext_data->recipient = isset($data1['exrecpnt']) ? $data1['exrecpnt'] : null;
                    $ext_data->by_whom = isset($data1['exByWhom']) ? $data1['exByWhom'] : null;
                    $ext_data->ext_when = isset($data1['exWhen']) ? $data1['exWhen'] : null;
                    $ext_data->save();
                    $status = true;
                       
                }
                $int_msg = $request['int_msg'];
                foreach ($int_msg as $data2) {     
                    $int_msg = InternalMessage::firstOrNew(array('id' => $data2['id']));
                    $int_msg->user_id = Auth::user()->id;
                    $int_msg->workflow_id = $data['workflow_id'];
                    $int_msg->msg = isset($data2['intMsg']) ? $data2['intMsg'] : null;
                    $int_msg->how_to_say = isset($data2['intHowSay']) ? $data2['intHowSay'] : null;
                    $int_msg->recipient = isset($data2['intrecpnt']) ? $data2['intrecpnt'] : null;
                    $int_msg->by_whom = isset($data2['intByWhom']) ? $data2['intByWhom'] : null;
                    $int_msg->int_when = isset($data2['intWhen']) ? $data2['intWhen'] : null;
                    $int_msg->save();
                    $status = true;

                       
                }

                $ques = $request['ques'];
                foreach ($ques as $data2) { 
                    $que = Question::firstOrNew(array('id' => $data2['id']));
                    $que->user_id = Auth::user()->id;
                    $que->workflow_id = $data['workflow_id'];
                    $que->ques = isset($data2['ques']) ? $data2['ques'] : null;
                    $que->who_to_ask = isset($data2['who_to_ask']) ? $data2['who_to_ask'] : null;
                    $que->how_you_ask_it = isset($data2['how_you_ask_it']) ? $data2['how_you_ask_it'] : null;
                  
                    $que->save();
                    $status = true;

                       
                }
                if ($status) {  
                    return response()->json([
                        "status"  =>  "success",
                        "message" =>  "Communication Added Successfully."
                    ]);
                } else {
                    return response()->json([
                        "status"  =>  "error",
                        "message" =>  "Communication Added Failed."
                        ]);
                }
            }
        }catch (\Exception $ex) {
            return back()->withError(($ex->getMessage()));
        } 
    }
   
/**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteCommunication(Request $request){

        $id = $request['id'];
        
        $deletevar = Communication::where('id', '=', $id)->delete();
         // if ($deletevar) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        // } else {
        // return response()->json([
        //     "status"  =>  "error",
        //     ]);
        // }
    }



    /**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteExtMsg(Request $request){

        $id = $request['id'];
        
        $deletevar = ExternalMessage::where('id', '=', $id)->delete();
         // if ($deletevar) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        // } else {
        // return response()->json([
        //     "status"  =>  "error",
        //     ]);
        // }
    }


      /**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteIntMsg(Request $request){

        $id = $request['id'];
        
        $deletevar = InternalMessage::where('id', '=', $id)->delete();
         // if ($deletevar) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        // } else {
        // return response()->json([
        //     "status"  =>  "error",
        //     ]);
        // }
    }

    public function deleteQues(Request $request){

        $id = $request['id'];
        
        $deletevar = Question::where('id', '=', $id)->delete();
         // if ($deletevar) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        // } else {
        // return response()->json([
        //     "status"  =>  "error",
        //     ]);
        // }
    }

    
}
