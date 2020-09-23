<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Variable;
use App\TimeEvent;
use Auth;
use App\Execute;

class VariableController extends Controller
{

    /**
     * @Created By Gaurav Bisht
     * @Created Date 06 January 2020
     * @param  none
     * @return none
     */
    public function addVariable()
    {
        $variable_data = Variable::all()->where('user_id',Auth::user()->id);
        return view('pages.variable',compact('variable_data'));
    }

    /**
     * @Created By Gaurav Bisht
     * @Created Date 07 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function storeVariable(Request $request)
    {
        try{
            if ($request->has('_token')) {
                $variable_data = $request['data'];
                foreach ($variable_data as $data) {
                    $aa = Variable::where('id',$data['id'])->where('user_id',Auth::user()->id)->first();
                    if ($aa) {
                        Variable::whereId($data['id'])->update([
                            'variables' => isset($data['variable']) ? $data['variable'] : null,
                        'take_give_status' => isset($data['take_give_status']) ? $data['take_give_status'] : null,
                        'user_id' => Auth::user()->id,
                          'workflow_id' => $data['workflow_id'],
                        'take_value' => isset($data['take_value']) ? $data['take_value'] : null,
                        'take_cost' => isset($data['take_cost']) ? $data['take_cost'] : null,
                        'give_cost' => isset($data['give_cost']) ? $data['give_cost'] : null,
                        'give_value' => isset($data['give_value']) ? $data['give_value'] : null,
                    'your_breakpoint' => isset($data['your_breakpoint']) ? $data['your_breakpoint'] : null,
                    'their_breakpoint' => isset($data['their_breakpoint']) ? $data['their_breakpoint'] : null,
                        ]);
                        $status = true;
                    } else {
                        $variable = new Variable();
                        $variable->variables = isset($data['variable']) ? $data['variable'] : null;
                        $variable->take_give_status = isset($data['take_give_status']) ? $data['take_give_status'] : null;
                        $variable->user_id = Auth::user()->id;
                        $variable->workflow_id = $data['workflow_id'];
                        $variable->take_value = isset($data['take_value']) ? $data['take_value'] : null;
                        $variable->take_cost = isset($data['take_cost']) ? $data['take_cost'] : null;
                        $variable->give_cost = isset($data['give_cost']) ? $data['give_cost'] : null;
                        $variable->give_value = isset($data['give_value']) ? $data['give_value'] : null;
                        $variable->your_breakpoint = isset($data['your_breakpoint']) ? $data['your_breakpoint'] : null;
                        $variable->their_breakpoint = isset($data['their_breakpoint']) ? $data['their_breakpoint'] : null;
                        $variable->save();
                        $status = true;
                    }
                }
                if ($status) {  
                    return response()->json([
                        "status"  =>  "success",
                        "message" =>  "Variable Added Successfully."
                    ]);
                } else {
                return response()->json([
                    "status"  =>  "error",
                    "message" =>  "Vaiable Added Failed."
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
    public function deleteVariable(Request $request){

        $id = $request['id'];
        
        $deletevar = Variable::where('id', '=', $id)->delete();
         //if ($deletevar) {  
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
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function deleteEvent(Request $request){

        $id = $request['id'];
        
        $deletevar = TimeEvent::where('id', '=', $id)->delete();
         //if ($deletevar) {  
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
     * @Created By Gaurav Bisht
     * @Created Date 08 January 2020
     * @param  none
     * @return none
     */
    public function addTime()
    {
        $timeevent_data = TimeEvent::all()->where('user_id',Auth::user()->id);

        $both_time = TimeEvent::select('start_date','end_date')->where('user_id',Auth::user()->id)->get();
        $both_time = $both_time->toArray();
        return view('pages.time',compact('timeevent_data','both_time'));
    }

    /**
     * @Created By Gaurav Bisht
     * @Created Date 08 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function storeEvent(Request $request)
    {
       //echo '<pre>';print_r($request->all());die;
        try {
            if ($request->has('_token')) {
                $event_data = $request['data'];
                  $aa = TimeEvent::where('workflow_id',$event_data[0]['workflow_id'])->where('user_id',Auth::user()->id)->first();
                //echo '<pre>';print_r($aa);die;
               
                   
                    if (!empty($aa)) {
                        foreach ($event_data as $data) {
                            $timeevent = [];
                            $timeevent['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
                            $timeevent['user_id'] = Auth::user()->id;
                            $timeevent['workflow_id'] = $data['workflow_id'];
                            $timeevent['who'] = isset($data['who']) ? $data['who'] : null;
                            $timeevent['what'] = isset($data['what']) ? $data['what'] : null;
                            $timeevent['date'] = isset($data['date']) ? $data['date'] : null;
                            $timeevent['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
                            $timeevent['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;

                             TimeEvent::where('id',$data['id'])->update(
                                 $timeevent
                            );
                            $status = true;
                        }

                        // TimeEvent::where('id',$aa['id'])->update([
                        //     'event_type' => isset($data['event_type']) ? $data['event_type'] : null,
                        //     'user_id' => Auth::user()->id,
                        //     'workflow_id' => $data['workflow_id'],
                        //     'who' => isset($data['who']) ? $data['who'] : null,
                        //     'what' => isset($data['what']) ? $data['what'] : null,
                        //     'date' => isset($data['date']) ? $data['date'] : null,
                        //     'start_date' => isset($data['start_date']) ? $data['start_date'] : null,
                        //     'end_date' => isset($data['end_date']) ? $data['end_date'] : null,
                        // ]);
                        // $status = true;
                    } else {
                        foreach ($event_data as $data) {
                            $timeevent = [];
                            $timeevent['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
                            $timeevent['user_id'] = Auth::user()->id;
                            $timeevent['workflow_id'] = $data['workflow_id'];
                            $timeevent['who'] = isset($data['who']) ? $data['who'] : null;
                            $timeevent['what'] = isset($data['what']) ? $data['what'] : null;
                            $timeevent['date'] = isset($data['date']) ? $data['date'] : null;
                            $timeevent['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
                            $timeevent['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;

                          
                            TimeEvent::create(
                                 $timeevent
                            );
                            $status = true;
                        }

                       
                    }
               
               
                if ($status) {  
                    return response()->json([
                        "status"  =>  "success",
                        "message" =>  "Event Added Successfully."
                    ]);
                } else {
                return response()->json([
                    "status"  =>  "error",
                    "message" =>  "Event Added Failed."
                    ]);
                }
            }
        } catch (\Exception $ex) {
            return back()->withError(($ex->getMessage()));
        }
    }

   public function createGraph(Request $request)
    {
       
        $event_data = $request['data'];
        $date_range = [];
        $between_date = [];
        $date_range['start_date'] = $event_data[0];
        $date_range['end_date'] = $event_data[1];
        //echo '<pre>';print_r( $event_data);die;
        unset($event_data[0]);
        unset($event_data[1]);

        foreach ($event_data as $data) {
            $between_date['date'][] = $data['date'];
        }
        sort($between_date['date']);
       
        $datediff = strtotime($date_range['end_date']) - strtotime($date_range['start_date']);
        $total_days = round($datediff / (60 * 60 * 24));
        
        $comp_array = [];
        
        for ($i=0;$i<=abs($total_days);$i++) {
            $next_day = date('Y-m-d', strtotime($date_range['start_date'].' +'.$i.' day'));
            $comp_array[] = $next_day;
        }
        $found_keys = [];
        foreach ($between_date['date'] as $betw_date) {
            foreach ($comp_array as $key => $value) {
                if (strtotime($betw_date) == strtotime($value)) {
                    $found_keys[] = $value;
                    break;
                }
            }
        }

        return [$comp_array,$found_keys];
    }
    /**
     * @Created By Gaurav Bisht
     * @Created Date 16 January 2020
     * @param  none
     * @return laravel blade template
     */
    public function moreOffer()
    {
        $your_offer = Execute::all()->where('user_id',Auth::user()->id)->where('status','your');
        if ($your_offer->isNotEmpty()) {
             $your_offer_show = Execute::select('offer_length')->where('user_id',Auth::user()->id)->where('status','your')->first()->toArray();
        }

        $their_offer = Execute::all()->where('user_id',Auth::user()->id)->where('status','their');
       if ($their_offer->isNotEmpty()) {
        $their_offer_show = Execute::select('offer_length')->where('user_id',Auth::user()->id)->where('status','their')->first()->toArray();
       }

        $steps_offer = Execute::all()->where('user_id',Auth::user()->id)->where('status','step');

        return view('pages.moreoffer',compact('your_offer','their_offer','your_offer_show','their_offer_show','steps_offer'));

    }


    /**
     * @Created By Gaurav Bisht
     * @Created Date 17 January 2020
     * @param  Request $request
     * @return JSON Response
     */
    public function storeOffer(Request $request)
    {    
        try{
            if ($request->isMethod('post')) {
               
                $steps_offer_data = $request['steps_data'];
                $workflow_id = $request['workflow_id'];
                $done_better = $request['done_better'];
                $worked_well = $request['worked_well'];
               

                if (sizeof($steps_offer_data)>0) {
                    foreach ($steps_offer_data as $data) {
                    $aa = Execute::where('id',$data['id'])->where('user_id',Auth::user()->id)->first();
                    if ($aa) {
                        $execute = Execute::find($data['id']);
                        $execute->who = isset($data['who']) ? $data['who'] : null;
                        $execute->what = isset($data['what']) ? $data['what'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->when = isset($data['when']) ? $data['when'] : null;
                        $execute->worked_well = isset($worked_well) ? $worked_well : null;
                        $execute->done_better = isset($done_better) ? $done_better : null;
                        $execute->save();
                        $status = true;
                    } else {
                        $execute = new Execute();
                        $execute->who = isset($data['who']) ? $data['who'] : null;
                        $execute->what = isset($data['what']) ? $data['what'] : null;
                        $execute->user_id = Auth::user()->id;
                        $execute->workflow_id = $workflow_id;
                        $execute->when = isset($data['when']) ? $data['when'] : null;
                        $execute->worked_well = isset($worked_well) ? $worked_well : null;
                        $execute->done_better = isset($done_better) ? $done_better : null;
                        $execute->save();
                        $status = true;
                    }
                }
            }
            }
                if ($status) {  
                    return response()->json([
                        "status"  =>  "success",
                        "message" =>  "Align Saved Successfully."
                    ]);
                } else {
                return response()->json([
                    "status"  =>  "error",
                    "message" =>  "Align Saved Failed."
                    ]);
                }
            
        }catch (\Exception $ex) {
            return back()->withError(($ex->getMessage()));
        } 

    
    }

    public function deleteExecute(Request $request){

        $id = $request['id'];
        
        $deletevar = Execute::where('id', '=', $id)->delete();
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
