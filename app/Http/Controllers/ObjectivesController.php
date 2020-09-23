<?php

namespace App\Http\Controllers;

use Validator;
use Exception;
use App\ContactUs;
use Mail;
use App\Mail\ContactUsMail;
use App\YourObjective;
use App\TheirObjective;
//use App\Objective;
use App\Power;
use App\Risk;
use App\Negotiate;
use App\Variable;
use App\TimeEvent;
use App\Communication;
use App\ExternalMessage;
use App\InternalMessage;
use App\Acceptworkflow;
use App\Execute;
use App\Offers;
use App\Workflow;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use PDF;
use App;
use Response;
class ObjectivesController extends Controller {

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Objectives 
     * @param 
     * @return objective view page
     * Created By: Nishant Kumar
     * Created At: 03 Jan 2020 
     */
    public function objectives($id) {
        $workflow_id = $id;
        $user_id = Auth::user()->id;
        //$Objectives = Objective::where('workflow_id', $workflow_id)->get();
        $your_Objectives = YourObjective::where('workflow_id', $workflow_id)->get();
        $their_Objectives = TheirObjective::where('workflow_id', $workflow_id)->get();
        $Power = Power::where('workflow_id', $workflow_id)->get();
        $Risks = Risk::where('workflow_id', $workflow_id)->get();
        $Negotiates = Negotiate::where('workflow_id', $workflow_id)->get();
        $variable_data = Variable::all()->where('workflow_id', $workflow_id);
        $timeevent_data = TimeEvent::all()->where('workflow_id', $workflow_id);
        $both_time = TimeEvent::select('start_date', 'end_date')->where('workflow_id', $workflow_id)->get();
        $both_time = $both_time->toArray();
        $communication = Communication::where('workflow_id', $workflow_id)->get();
        $extMsg = ExternalMessage::where('workflow_id', $workflow_id)->get();
        $intMsg = InternalMessage::where('workflow_id', $workflow_id)->get();
        $useraccess = Acceptworkflow::where('workflow_id', $workflow_id)->get();
        $workflow = Workflow::where('id', $workflow_id)->get();
        $ques = Question::where('workflow_id', $workflow_id)->get();
        $yoursoffersonly = [];
        $your_offer = Offers::all()->where('workflow_id', $workflow_id)->where('status', 'your');
        //dd($your_offer);
        $your_offer_show = '';
        if ($your_offer->isNotEmpty()) {
            $your_offer_show = Offers::select('offer_length')->where('workflow_id', $workflow_id)->where('status', 'your')->first()->toArray();
            foreach ($your_offer as $myoffer) {
                //$yoursoffersonly['offers'][] = json_decode($myoffer->offer);
                foreach (json_decode($myoffer->offer) as $offr) {
                    $yoursoffersonly['offers'][] = $offr;
                }
            }
        }

        $their_offer = Offers::all()->where('workflow_id', $workflow_id)->where('status', 'their');
        $their_offer_show = "";
        if ($their_offer->isNotEmpty()) {
            $their_offer_show = Offers::select('offer_length')->where('workflow_id', $workflow_id)->where('status', 'their')->first()->toArray();

            foreach ($their_offer as $thoffer) {
                //$yoursoffersonly['offers'][] = json_decode($myoffer->offer);
                foreach (json_decode($thoffer->offer) as $thoffr) {
                    $yoursoffersonly['thoffers'][] = $thoffr;
                }
            }
        }

        $steps_offer = Execute::all()->where('workflow_id', $workflow_id);

        $infulenceChart = [];
        $influencedData = Communication::where('workflow_id', $workflow_id)->orderBy('rank', 'ASC')->get();

        foreach($influencedData as $keyz => $data)
         {
            // echo "<pre><br>".$keyz;
            // print_r($data->who); 
            $infulenceChart['users'][$keyz] = $data;
            $infulenceChart['users'][$keyz]['influBy'] = Communication::where('workflow_id',$workflow_id)->where('influence_by',$data->who)->orderBy('rank', 'ASC')->get(); 
         }
        // dd($influencedData);
        // Recursive influence by only for first rank
        // if (!empty($influencedData) && !empty($influencedData[0]) && $influencedData[0]->influence_by) {
        //     $influencedData[0]['influence_by_user'] = $this->getInfluenceBy($influencedData[0]->influence_by,$influencedData[0]->rank,$id);
        // }
        $influencedFromUser = [];
        foreach ($influencedData as $user) {
            $influencedFromUser[$user->who] = Communication::where('influence_by', 'LIKE', "%$user->who%")->get();
        // dd('hello');
        }

        // dd($influencedFromUser);

        return view('pages.objective', compact('your_Objectives','their_Objectives', 'Power', 'Risks', 'Negotiates', 'variable_data', 'timeevent_data', 'both_time', 'communication', 'extMsg', 'intMsg', 'workflow_id', 'useraccess', 'your_offer', 'their_offer', 'your_offer_show', 'their_offer_show', 'steps_offer', 'yoursoffersonly', 'influencedData', 'influencedFromUser','workflow','infulenceChart','ques'));
    }


    public function allplans($id) {
        $workflow_id = $id;
        $user_id = Auth::user()->id;
        //$Objectives = Objective::where('workflow_id', $workflow_id)->get();
        $your_Objectives = YourObjective::where('workflow_id', $workflow_id)->get();
        $their_Objectives = TheirObjective::where('workflow_id', $workflow_id)->get();
        $Power = Power::where('workflow_id', $workflow_id)->get();
        $Risks = Risk::where('workflow_id', $workflow_id)->get();
        $Negotiates = Negotiate::where('workflow_id', $workflow_id)->get();
        $variable_data = Variable::all()->where('workflow_id', $workflow_id);
        $timeevent_data = TimeEvent::all()->where('workflow_id', $workflow_id);
        $both_time = TimeEvent::select('start_date', 'end_date')->where('workflow_id', $workflow_id)->get();
        $both_time = $both_time->toArray();
        $communication = Communication::where('workflow_id', $workflow_id)->get();
        $extMsg = ExternalMessage::where('workflow_id', $workflow_id)->get();
        $intMsg = InternalMessage::where('workflow_id', $workflow_id)->get();
        $useraccess = Acceptworkflow::where('workflow_id', $workflow_id)->get();
        $workflow = Workflow::where('id', $workflow_id)->get();
        $ques = Question::where('workflow_id', $workflow_id)->get();
         //echo '<pre>'; print_r($workflow[0]->user_id); exit;
        $yoursoffersonly = [];
        $your_offer = Offers::all()->where('workflow_id', $workflow_id)->where('status', 'your');
        //dd($your_offer);
        $your_offer_show = '';
        if ($your_offer->isNotEmpty()) {
            $your_offer_show = Offers::select('offer_length')->where('workflow_id', $workflow_id)->where('status', 'your')->first()->toArray();
            foreach ($your_offer as $myoffer) {
                //$yoursoffersonly['offers'][] = json_decode($myoffer->offer);
                foreach (json_decode($myoffer->offer) as $offr) {
                    $yoursoffersonly['offers'][] = $offr;
                }
            }
        }

        $their_offer = Offers::all()->where('workflow_id', $workflow_id)->where('status', 'their');
        $their_offer_show = "";
        if ($their_offer->isNotEmpty()) {
            $their_offer_show = Offers::select('offer_length')->where('workflow_id', $workflow_id)->where('status', 'their')->first()->toArray();

            foreach ($their_offer as $thoffer) {
                //$yoursoffersonly['offers'][] = json_decode($myoffer->offer);
                foreach (json_decode($thoffer->offer) as $thoffr) {
                    $yoursoffersonly['thoffers'][] = $thoffr;
                }
            }
        }

        $steps_offer = Execute::all()->where('workflow_id', $workflow_id);

        $infulenceChart = [];
        $influencedData = Communication::where('workflow_id', $workflow_id)->orderBy('rank', 'ASC')->get();
        // Recursive influence by only for first rank
        if (!empty($influencedData) && !empty($influencedData[0]) && $influencedData[0]->influence_by) {
            $influencedData[0]['influence_by_user'] = $this->getInfluenceBy($influencedData[0]->influence_by,$influencedData[0]->rank,$id);
        }
        $influencedFromUser = [];
        foreach ($influencedData as $user) {
            $influencedFromUser[$user->who] = Communication::where('influence_by', 'LIKE', "%$user->who%")->get();
        // dd('hello');
        }


       return view('pages.all_plans', compact('your_Objectives','their_Objectives', 'Power', 'Risks', 'Negotiates', 'variable_data', 'timeevent_data', 'both_time', 'communication', 'extMsg', 'intMsg', 'workflow_id', 'useraccess', 'your_offer', 'their_offer', 'your_offer_show', 'their_offer_show', 'steps_offer', 'yoursoffersonly', 'influencedData', 'influencedFromUser','ques'));

        // $pdf = PDF::loadView('pages.all_plans', ['your_Objectives'=>$your_Objectives, 'their_Objectives'=>$their_Objectives,'Power'=>$Power,'Risks'=>$Risks,'Negotiates'=>$Negotiates,'variable_data'=>$variable_data,'timeevent_data'=>$timeevent_data,'both_time'=>$both_time,'communication'=>$communication,'extMsg'=>$extMsg,'intMsg'=>$intMsg,'workflow_id'=>$workflow_id, 'useraccess'=>$useraccess, 'your_offer'=>$your_offer, 'their_offer'=>$their_offer, 'your_offer_show'=>$your_offer_show, 'their_offer_show'=>$their_offer_show, 'steps_offer'=>$steps_offer, 'yoursoffersonly'=>$yoursoffersonly, 'influencedData'=>$influencedData, 'influencedFromUser'=>$influencedFromUser,'ques'=>$ques]);
        // //sleep(25);
        // return $pdf->stream('document.pdf');
    }

    private function getInfluenceBy($influence_by,$current_rank,$workflow_id) {
        $influence_by = explode(',', $influence_by);
        $influence_user = Communication::whereIn('who', $influence_by)->orderBy('rank', 'ASC')->get();
        $not_influence_user_with_same_rank = Communication::whereNotIn('who', $influence_by)->where('workflow_id',$workflow_id)->where('rank', '=', ($current_rank+1))->orderBy('rank', 'ASC')->get();
        //dump($not_influence_user_with_same_rank);
        $recursive_data = collect($influence_user)->each(function($user_data) use ($current_rank){
            if ($user_data->influence_by && $user_data->rank > $current_rank)
            {
                    return $user_data['influence_by_user'] = $this->getInfluenceBy($user_data->influence_by,$user_data->rank,$user_data->workflow_id);
            }
              // elseif($user_data->rank < $current_rank)
              //   {
              //       return $user_data['influence_by_user'] = $this->getInfluenceBy($user_data->influence_by,$user_data->rank,$user_data->workflow_id);
              //   }
            else
            {
                return $user_data;
            }
        });
        if(!empty($not_influence_user_with_same_rank))
        {
            $collection = collect($recursive_data);
            $collection->push($not_influence_user_with_same_rank);
            $collection->all();
        }   
        return $recursive_data;
    }

    private function addChartChild($chartData) {
        echo '<li>
                                <a href="#" id="chart-node-'.$chartData->who.'">
                                    <img class="arrow-inf arrow-down" src="'. asset('uploads/images/detail_page_icons').'/arrow-up.svg">' ;
        echo $chartData->who
        . '<div class="nameInfo">
                                         <table>
                                                   <tr>
                                                              <td><img src="'.asset('uploads/images/detail_page_icons').'/job-seeker.svg" alt=""></td>
                                                              <td>' . $chartData->personality_type . '</td>
                                                    </tr>
                                                    <tr>
                                                              <td><img src="'.asset('uploads/images/detail_page_icons').'/skills.svg" alt=""></td>
                                                              <td>' . $chartData->decision_maker_type . '</td>
                                                    </tr>
                                                    <tr>
                                                              <td><img src="'. asset('uploads/images/detail_page_icons').'/high-five.svg" alt=""></td>
                                                              <td>' . $chartData->relation_status . '</td>
                                                     </tr>
                                         </table>
                              </div>
                    </a>';
        if ($chartData->influence_by_user) {
            $this->creatChartChildLayer($chartData);
        }
        echo '</li>';
    }
    
    private function influenceParent($chartNode,$currentUser,$influencedData){
        $currentUserData = collect($influencedData)->firstWhere('who', $currentUser);
        collect($chartNode)->each(function($value) use ($currentUserData,$currentUser){
            if($value->rank > $currentUserData->rank)
                echo '<script>$("#chart-node-'.$value->who.'").append(\'<img class="arrow-inf influence-back" src="'. asset('uploads/images/detail_page_icons').'/arrow-up.svg">\')</script>';
        });
    }

    private function addChartRow($chartData) {
        echo "<ul>";
        foreach ($chartData->influence_by_user as $value) {
            if($chartData->rank < $value->rank)
                $this->addChartChild($value);
        }
        echo "</ul>";
    }

    public function creatChartChildLayer($chartData) {
        //dump($chartData);
        if ($chartData->influence_by_user) {
                $this->addChartRow($chartData);
        }
    }
    
    
    public function creatChartParentInfluence($influencedData,$influencedFromUser) {
        collect($influencedFromUser)->each(function($user,$currentUser) use ($influencedData){
            $this->influenceParent($user,$currentUser,$influencedData);
        });
    }

    /**
     * Save Objectives 
     * @param 
     * @return Success message 
     * Created By: Nishant Kumar
     * Created At: 03 Jan 2020 
     */
    public function SaveObjectives() {
        // echo "<pre>";
        //echo "<pre>";print_r($this->request->all()); die;
        $workflow_id = $this->request->workflow_id;

        $your_specific = $this->request->your_specific;
        $your_measurable = $this->request->your_measurable;
        $your_time_bound = $this->request->your_time_bound;
        $your_relevant = $this->request->your_relevant;
        $your_achievable = $this->request->your_achievable;
        $your_internal_rest = $this->request->your_internal_rest;
        $your_external_rest = $this->request->your_external_rest;

        $their_specific = $this->request->their_specific;
        $their_measurable = $this->request->their_measurable;
        $their_time_bound = $this->request->their_time_bound;
        $their_relevant = $this->request->their_relevant;
        $their_achievable = $this->request->their_achievable;
        /*$their_internal_rest = $this->request->their_internal_rest;
        $their_external_rest = $this->request->their_external_rest;*/
        $user_id = $this->request->user_id;
        $obj_id = $this->request->obj_id;
        $your_obj_id = $this->request->your_obj_id;
        $ids = [];
        $your_ids = [];
        $obj_count = 0;
        $background = $this->request->background;
        foreach ($your_specific as $key => $value) {
                
            $data = [
                'user_id' => $user_id,
                'workflow_id' => $workflow_id,
                'your_specific' => isset($value) ? $value : "",
                'your_measurable' => isset($your_measurable[$key]) ? $your_measurable[$key] : "",
                'your_time_bound' => isset($your_time_bound[$key]) ? $your_time_bound[$key] : "",
                'your_relevant' => isset($your_relevant[$key]) ? $your_relevant[$key] : "",
                'your_achievable' => isset($your_achievable[$key]) ? $your_achievable[$key] : "",
                'your_internal_restrictions' => $your_internal_rest[0],
                'your_external_restrictions' => $your_external_rest[0],
                'background' => $background,
               
            ];
           
      
            if (isset($your_obj_id[$key]) && $your_obj_id[$key] != "" && $your_obj_id[$key] != null) {
              // echo '<pre>';print_r($data);die;
                $saveOjb = YourObjective::where('id', '=', $your_obj_id[$key])->update($data);
                array_push($your_ids, $your_obj_id[$key]);
            } else {
                 $new_data = [
                    'user_id' => $user_id,
                    'workflow_id' => $workflow_id,
                    'your_specific' => isset($value) ? $value : "",
                    'your_measurable' => isset($your_measurable[$key]) ? $your_measurable[$key] : "",
                    'your_time_bound' => isset($your_time_bound[$key]) ? $your_time_bound[$key] : "",
                    'your_relevant' => isset($your_relevant[$key]) ? $your_relevant[$key] : "",
                    'your_achievable' => isset($your_achievable[$key]) ? $your_achievable[$key] : "",
                    'your_internal_restrictions' => $your_internal_rest[0],
                    'your_external_restrictions' => $your_external_rest[0],
                    'background' => $background,
                    
                    ];
                //echo '<pre>';print_r($new_data);die;
                $saveOjb = YourObjective::create($new_data);
                array_push($your_ids, $saveOjb->id);
            }
            $obj_count++;
        }
        foreach ($their_specific as $key => $value) {
           
            $data = [
                'user_id' => $user_id,
                'workflow_id' => $workflow_id,
                'their_specific' => isset($their_specific[$key]) ? $their_specific[$key] : "",
                'their_measurable' => isset($their_measurable[$key]) ? $their_measurable[$key] : "",
                'their_time_bound' => isset($their_time_bound[$key]) ? $their_time_bound[$key] : "",
                'their_relevant' => isset($their_relevant[$key]) ? $their_relevant[$key] : "",
                'their_achievable' => isset($their_achievable[$key]) ? $their_achievable[$key] : "",
               /* 'their_internal_restrictions' => $their_internal_rest[0],
                'their_external_restrictions' => $their_internal_rest[0],*/
            ];

           // print_r($data); exit;
            if (isset($obj_id[$key]) && $obj_id[$key] != "" && $obj_id[$key] != null) {
                // echo 'their';'<pre>';print_r($data);die;
                $saveOjb = TheirObjective::where('id', '=', $obj_id[$key])->update($data);
                array_push($ids, $obj_id[$key]);
            } else {
                $new_data = [
                    'user_id' => $user_id,
                    'workflow_id' => $workflow_id,
                    'their_specific' => isset($their_specific[$key]) ? $their_specific[$key] : "",
                    'their_measurable' => isset($their_measurable[$key]) ? $their_measurable[$key] : "",
                    'their_time_bound' => isset($their_time_bound[$key]) ? $their_time_bound[$key] : "",
                    'their_relevant' => isset($their_relevant[$key]) ? $their_relevant[$key] : "",
                    'their_achievable' => isset($their_achievable[$key]) ? $their_achievable[$key] : "",
                    ];
                //echo '<pre>';print_r($new_data);die;    
                $saveOjb = TheirObjective::create($new_data);
                array_push($ids, $saveOjb->id);
            }
            $obj_count++;
        }

        if ($obj_count != 0) {
            $result = [
                'id' => $ids,
                'your_id' => $your_ids,
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
    public function deleteobjectives(Request $request) {

        $id = $request['id'];

        $deletewflow = Objective::where('id', '=', $id)->delete();
        //if ($deletewflow) {  
        return response()->json([
                    "status" => "success",
        ]);
        /// } else {
    } 

    public function your_delete(Request $request){
        $id = $request['id'];

            $deletewflow = YourObjective::where('id', '=', $id)->delete();
            $request->session()->flash('message', 'Successfully deleted the objectives!');
            return redirect()->back();

    }

    public function their_delete(Request $request){
        $id = $request['id'];
            $deletewflow = TheirObjective::where('id', '=', $id)->delete();
            $request->session()->flash('message', 'Successfully deleted the objectives!');
            return redirect()->back();

    }

    // public function pdf_download(Request $request){
      
    //     $pdf = App::make('snappy.pdf.wrapper');
    //     $pdf->loadHTML('<h1>Test</h1>');
    //     return $pdf->inline();

    // }


}
