<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\ContactUs;
use Mail; 
use App\Mail\ContactUsMail;
use App\Objective;
use App\Power;
use Illuminate\Http\Request;


class PowersController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
    }


   
     /**
    * Power Page 
    * @param 
    * @return Power view page
    * Created By: Nishant Kumar
    * Created At: 03 Jan 2020 
    */

    public function power(){
        $user_id = Auth::user()->id;
        $Objectives = Objective::where('user_id',$user_id)->get();
        return view('pages.power');
    }

     /**
    * Save Power 
    * @param 
    * @return Success message 
    * Created By: Nishant Kumar
    * Created At: 03 Jan 2020 
    */

    public function SavePower(){ 
        $workflow_id = $this->request->workflow_id;
        $yq1 = $this->request->yq1;
        $yq2 = $this->request->yq2;
        $yq3 = $this->request->yq3;
        $yq4 = $this->request->yq4;
        $yq5 = $this->request->yq5;
        $cq1 = $this->request->cq1;
        $cq2 = $this->request->cq2;
        $cq3 = $this->request->cq3;
        $cq4 = $this->request->cq4;
        $cq5 = $this->request->cq5;
        $inh_thnk = $this->request->inh_thnk;
        $inh_how = $this->request->inh_how;
        $chng_thnk = $this->request->chng_thnk;
        $chng_how = $this->request->chng_how;
        $dwngd_think = $this->request->dwngd_think;
        $dwngd_how = $this->request->dwngd_how;
        $explt_thnk = $this->request->explt_thnk;
        $explt_how = $this->request->explt_how;         
        $user_id = $this->request->user_id;    
        $power_id = $this->request->power_id;    

      $data = [
            'user_id'=>$user_id,
            'workflow_id'=>           $workflow_id,
            'your_answer1'         => $yq1,
            'your_answer2'         => $yq2,
            'your_answer3'         => $yq3,
            'your_answer4'         => $yq4,
            'your_answer5'         => $yq5,
            'counter_answer1'      => $cq1,
            'counter_answer2'      => $cq2,
            'counter_answer3'      => $cq3,
            'counter_answer4'      => $cq4,
            'counter_answer5'      => $cq5,
            'enhence_think'        => $inh_thnk,
            'enhence_how'          => $inh_how,
            'change_think'         => $chng_thnk,
            'change_how'           => $chng_how,
            'downgrade_think'      => $dwngd_think,
            'downgrade_how'        => $dwngd_how,
            'explot_think'         => $explt_thnk,
            'explot_how'           => $explt_how,
               
        ];
        if($power_id != '')
        {
            $savePower = Power::where('id', '=', $power_id)->update($data);
        }else
        {
            $savePower =   Power::create($data);
        }
        
       
        if($savePower)
        {
            echo "success";
        }
 
    }

   


    
}
