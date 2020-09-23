<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\Workflow;
use App\Acceptworkflow;
use App\ContactUs;
use App\User;
use Mail; 
use Illuminate\Http\Request;
use Auth;
use Session;
class WorkflowController extends Controller
{

    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * @Created By Nishant Kumar
     * @Created Date 16 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function storeWorkflow(Request $request)
    {
       
        try{
            if ($request->has('_token')) {
                $workflow_data = $request['data'];
                $workflow_name = $request['name'];
                //echo $workflow_name.'<pre>'; print_r($request['data']); exit;
                $wdata = [
                            'user_id' => Auth::user()->id,
                            'name' => isset($workflow_name ) ? $workflow_name : null,
                            
                        ];

                $wflowcreate = Workflow::create($wdata); 
                if($wflowcreate)
                {
                    $status = true;
                }
                       // dd($workflow_data[0]['email']);
                foreach ($workflow_data as $data) {
                    if($data['email'] != null)
                    {
                        $loggedin_mail = Auth::user()->email;
                        $domain = substr($loggedin_mail, strrpos($loggedin_mail, '@') + 1);

                        $userexist = User::where('email',$data['email'])->where("email", "LIKE", "%" . $domain . "%")->get();
                        $adduser = "";
                        $addTo = User::where('email',$data['email'])->get();
                        if(!$addTo->isEmpty()) {
                            $adduser = $addTo[0]->id;
                            $wusers = [
                            'user_id' => $adduser,
                            'user_added_by' => Auth::user()->id,
                            'workflow_id' => $wflowcreate->id,
                            'email' => isset($data['email']) ? $data['email'] : null,
                            'status' => 0,
                            'registration_status' => 1,
                            'readaccess' => isset($data['readaccess']) ? $data['readaccess'] : 0,
                            'writeaccess' => isset($data['writeaccess']) ? $data['writeaccess'] : null,
                        ];
                        $wflowdata = Acceptworkflow::create($wusers);
                        $mail = Mail::send('emails.workflow-notification', ['workflow_id'=>$wflowcreate->id,'name_from'=>Auth::user()->name,'created_for'=>$adduser], function ($m) use ($wusers) {
                            $m->from('info@themakergroup.com', 'The Maker Group');
                            $m->to($wusers['email'])->subject('Workflow Notification');
                            });
                        } else {
                            $wusers = [
                            'user_id' => 0,
                            'user_added_by' => Auth::user()->id,
                            'workflow_id' => $wflowcreate->id,
                            'email' => isset($data['email']) ? $data['email'] : null,
                            'status' => 0,
                            'registration_status' => 0,
                            'readaccess' => isset($data['readaccess']) ? $data['readaccess'] : 0,
                            'writeaccess' => isset($data['writeaccess']) ? $data['writeaccess'] : null,
                        ]; 
                        //print_r($wusers); exit;
                        $wflowdata = Acceptworkflow::create($wusers);

                        }
                         
                        //if(!$userexist->isEmpty()) {                      	
                        	



                         	$status = true;
                        //} 
                        


                            $status = true;
                }
            }
                if ($status) {  
                    return response()->json([
                        "status"  =>  "success",
                        "message" =>  "Workflow Added Successfully."
                    ]);
                } else {
                return response()->json([
                    "status"  =>  "error",
                    "message" =>  "Workflow Added Failed."
                    ]);
                }
            }
        }catch (\Exception $ex) {
            return back()->withError(($ex->getMessage()));
        } 
    }

    /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */

    public function acceptWorkflow($id,$user){
        $workflow_id = $id;
        $user_id = $user;
        $data = [ 'status' => 1 ];
         $wflow = Acceptworkflow::where('workflow_id', '=', $workflow_id)->where('user_id', '=', $user_id)->update($data);

        if($wflow)
        {
            Session::flash('message', 'Workflow has been accepted successfully!'); 
            return redirect('objectives/'.$id);
        }


    }




      /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */

    public function editWorkflow(Request $request){
        // if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ){
        // $workflows = [];
        // $workflowbyother = [];
        // $workflowslist = Workflow::get()->all();
        // $workflowbyother = Acceptworkflow::where('status',1)->get()->all();
        
        // foreach ($workflowslist as $key => $value) {
        //     $workflows['workflow'][$key][] = $value;

        //     $workflows['workflow'][$key]['users'][] = Acceptworkflow::where('workflow_id',$value->id)->get()->all();
        // }

        // foreach($workflowbyother as $key => $value)
        // {
        //     //$workflows['users'][$key][] = $value;
        //      $workflowbyother['workflow'][] = Workflow::where('id',$value->workflow_id)->with('workflow_user')->get();

        // }

        // }else{
        //      $user_id = Auth::user()->id;
        // $workflows = [];
        // $workflowbyother = [];
        // $workflowslist = Workflow::where('user_id',Auth::user()->id)->get();
        // $workflowbyother = Acceptworkflow::where('user_id',$user_id)->where('status',1)->get()->all();
        
        // foreach ($workflowslist as $key => $value) {
        //     $workflows['workflow'][$key][] = $value;

        //     $workflows['workflow'][$key]['users'][] = Acceptworkflow::where('workflow_id',$value->id)->get()->all();
        // }

        // foreach($workflowbyother as $key => $value)
        // {
        //     //$workflows['users'][$key][] = $value;
        //      $workflowbyother['workflow'][] = Workflow::where('id',$value->workflow_id)->with('workflow_user')->get();

        // }

        // }

              $user_id = Auth::user()->id;
        $workflows = [];
        $workflowbyother = [];
        $workflowslist = Workflow::where('user_id',Auth::user()->id)->get();
        $workflowbyother = Acceptworkflow::where('user_id',$user_id)->where('status',1)->get()->all();
        
        foreach ($workflowslist as $key => $value) {
            $workflows['workflow'][$key][] = $value;

            $workflows['workflow'][$key]['users'][] = Acceptworkflow::where('workflow_id',$value->id)->get()->all();
        }

        foreach($workflowbyother as $key => $value)
        {
            //$workflows['users'][$key][] = $value;
             $workflowbyother['workflow'][] = Workflow::where('id',$value->workflow_id)->with('workflow_user')->get();

        }
       
         //dd($workflows);
        //echo '<pre>'; print_r($workflowbyother); exit;
        
        return view('pages.editworkflow',compact('workflows','workflowbyother'));
    }


     /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteWorkflow(Request $request){

        $id = $request['id'];

        $deletewflow = Workflow::where('id', '=', $id)->delete();
         if ($deletewflow) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }

    /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteWorkflowUser(Request $request){

        $id = $request['id'];

        $deletewflow = Acceptworkflow::where('id', '=', $id)->delete();
         if ($deletewflow) {  
            return response()->json([
                "status"  =>  "success",
            ]);
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }


    /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     * To get workflow by id
     */
    public function getWorkflow(Request $request){

        $id = $request['id'];

        $workflow = Workflow::where('id', '=', $id)->get();
        
         if (!$workflow->isEmpty()) {  
            $result = [
                    'name' => $workflow[0]->name,
                    'id' => $workflow[0]->id,
                    'success' => 'success',
                ];
            return $result;
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }


    /**
     * @Created By Nishant Kumar
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     * To update workflow name by id
     */
    public function editworkflowname(Request $request){
        $id = $request['id'];
        $name = $request['name'];
        $workflow_data = $request['data'];
        $updatname = Workflow::where('id', '=', $id)->update(['name' => $name]);
        //print_r($id); exit;
        foreach ($workflow_data as $data) {

                    if($data['email'] != null)
                    {
                        $loggedin_mail = Auth::user()->email;
                        
                        $domain = substr($loggedin_mail, strrpos($loggedin_mail, '@') + 1);
                        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ){
                        $userexist = User::where('email',$data['email'])->get();
                        
                        }else{
                        $userexist = User::where('email',$data['email'])->where("email", "LIKE", "%" . $domain . "%")->get();
                        }

                        $adduser = "";
                        $addTo = User::where('email',$data['email'])->get();
                        $wusers['email']='';
                        //echo '<pre>'; print_r($userexist);die;
                        if(!$addTo->isEmpty()) {
                            $adduser = isset($addTo[0]->id);
                            $wusers = [
                            'user_id' => $adduser,
                            'user_added_by' => Auth::user()->id,
                            'workflow_id' => $id,
                            'email' => isset($data['email']) ? $data['email'] : null,
                            'status' => 0,
                            'readaccess' => isset($data['readaccess']) ? $data['readaccess'] : 0,
                            'writeaccess' => isset($data['writeaccess']) ? $data['writeaccess'] : null,
                        ]; 
                         
                        $wflowdata = Acceptworkflow::create($wusers);
                        }

                        if(!$userexist->isEmpty()) { 
                            $mail = Mail::send('emails.workflow-notification', ['workflow_id'=>$id,'name_from'=>Auth::user()->name,'created_for'=>$adduser], function ($m) use ($wusers) {
                            $m->from('info@themakergroup.com', 'The Maker Group');
                            $m->to($wusers['email'])->subject('Workflow Notification');
                            });



                            $status = true;
                       }
                       else{

                             $status= false;
                       } 
                        
                }
            }
        
         if ($updatname && !$userexist->isEmpty()) {  
            return response()->json([
            "status"  =>  "success",
            ]);
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }



     /**
     * @Created By Nishant Kumar
     * @Created Date 20 January 2020
     * @param  Request $request
     * @return JSON Response
     * To get workflow user by id
     */
    public function getWorkflowUser(Request $request){

        $id = $request['id'];

        $workflow = Acceptworkflow::where('id', '=', $id)->get();
        
         if (!$workflow->isEmpty()) {  
            $result = [
                    'id' => $workflow[0]->id,
                    'readaccess' => $workflow[0]->readaccess,
                    'writeaccess' => $workflow[0]->writeaccess,
                    'success' => 'success',
                ];
            return $result;
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }

        /**
     * @Created By Nishant Kumar
     * @Created Date 20 January 2020
     * @param  Request $request
     * @return JSON Response
     * To edit workflow user by id
     */
    
    public function editworkflowuser(Request $request){

        $id = $request['id'];
        $read = $request['read'];
        $write = $request['write'];

        $updatname = Acceptworkflow::where('id', '=', $id)->update(['writeaccess' => $write]);
        
         if ($updatname) {  
            return response()->json([
            "status"  =>  "success",
            ]);
        } else {
        return response()->json([
            "status"  =>  "error",
            ]);
        }
    }



        /**
     * @Created By Nishant Kumar
     * @Created Date 24 January 2020
     * @param  Request $request
     * @return JSON Response
     * To edit workflow user by id
     */
    
    public function checkworkflowuser(Request $request){

        $id = $request['workflow_id'];
        $name  = $request['name'];

        $workflow = Acceptworkflow::where('workflow_id',$id)->with('workflow_user')->get()->all();

        $exist = '';
        foreach($workflow as $workf)
        {
           $uname= $workf->workflow_user->name; 
            if($uname == $name)
            {
                $exist = $uname;
            }
        }
        $added_by = Workflow::where('id',$id)->with('workflow_user')->get();
        if (!empty($exist) || $name == $added_by[0]->workflow_user->name) {  
            return response()->json([
            "status"  =>  "exist",
            ]);
        } 
        else {
        return response()->json([
            "status"  =>  "notexist",
            ]);
        }
    }


}
