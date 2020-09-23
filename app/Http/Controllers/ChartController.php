<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;


// use Charts;
use App\User;
use DB;
use Auth;
use PDF;

class ChartController extends Controller
{
    //
    public function getChart(Request $request){
        // dd($request->all());
    		// if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){

      //          $chart_data = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

    		// }else{
                
                if(!empty($request['id'])){
                    $user_id = $request['id'];
                }else{
    			$user_id = Auth::user()->id;
                }

    			$sql = "SELECT AVG(ans.weightage) as avg,bucket_id FROM survey_responses as ans LEFT JOIN survey_questions as que on ans.question_id = que.id WHERE ans.user_id = '$user_id' GROUP BY que.bucket_id ORDER BY que.bucket_id";
    			$chart_values = DB::select($sql);
    			$chart_data = array();

    			foreach ($chart_values as $key => $value) {
                    $datalist = number_format((float)$value->avg, 2, '.', '');
    				array_push($chart_data, $datalist);
    			}


                $datalist_1 = implode(",", $chart_data);
                // dd($datalist_1);
    		// }
                
            return response()->json([
            	"status" => "success",
            	"chart_values" => $datalist_1
            ]);

    }




    public function getAdminChart(){

               $chart_data = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

            

                $user_id = Auth::user()->id;

                $sql = "SELECT AVG(ans.weightage) as avg,bucket_id FROM survey_responses as ans LEFT JOIN survey_questions as que on ans.question_id = que.id WHERE ans.user_id = 4 GROUP BY que.bucket_id ORDER BY que.bucket_id";
                $chart_values = DB::select($sql);
                $chart_data = array();

                foreach ($chart_values as $key => $value) {
                    array_push($chart_data, $value->avg);
                }
                return response()->json([
                    "status" => "success",
                    "chart_values" => $chart_data
                ]);

    }


    public function getPDF(){


    	if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){

    		}else{

    			$user_id = Auth::user()->id;

    			$sql = "SELECT AVG(ans.weightage) as avg,bucket_id FROM survey_responses as ans LEFT JOIN survey_questions as que on ans.question_id = que.id WHERE ans.user_id = 4 GROUP BY que.bucket_id ORDER BY que.bucket_id";
    			$chart_values = DB::select($sql);
    			$chart_data = array();

    			foreach ($chart_values as $key => $value) {
    				array_push($chart_data, $value->avg);
    			}
    			

    			

    		}

    	$pdf = PDF::loadView('pages.pdf.survey', compact('chart_data'));
		return $pdf->download('invoice.pdf');

    }
}
