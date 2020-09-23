<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\User;
use App\Comment;
use App\SurveyFeedbackResponse;
use App\SurveyQuestion;
use App\Mail\FeedbackReport;
use Storage;
use DB;
use PDF;
use Mail;


class ReportController extends Controller
{
   public function __construct(Request $request){
        $this->request = $request;
    }


    public function getReportPage(){
    	$batches = Batch::all();
    	return view('pages.list_report',compact('batches'));
    }


    public function getUserListForReports(){
    	$batch_id = $this->request->selected_batch;
    	$users = User::with('batch')->where('batch_id',$batch_id)->get();

    	$sql = "SELECT `submitted_for`,COUNT(sfr.id) as cby FROM `survey_feedback_responses` AS sfr LEFT JOIN users on sfr.`submitted_for` = users.id WHERE users.batch_id ='$batch_id' GROUP BY submitted_for HAVING cby = (SELECT (COUNT(id)-1)*8 FROM users WHERE batch_id = '$batch_id')";
    	$user_reports = DB::select($sql);
    	$ids= array();
    	if(isset($user_reports)){
    		foreach ($user_reports as $value) {

    	 		$ids[] = $value->submitted_for; 	
    		}

    	}
    	echo view('pages.report_table_ajax')->with(['users'=>$users,'ids'=>$ids]); 
    }



    public function detailReport($id){
    User::setSelectedUserId($id);
    $usr_batch_data = User::select('batch_id')->where('id',$id)->get();
    $batch_id = $usr_batch_data[0]['batch_id'];
    $report_data = User::with('feedbackResponses','comments')->where('batch_id',$batch_id)->where('id','!=',$id)->get();
    $comments =  Comment::where('submitted_for', $id)->select('liked_comment','disliked_comment')->get();
    	return view('pages.detail_report',compact('report_data','id','comments'));
    }
    public function feedbackChartDetails(Request $request){
    $id = $request->id;
        User::setSelectedUserId($id);
    $usr_batch_data = User::select('batch_id')->where('id',$id)->get();
    $batch_id = $usr_batch_data[0]['batch_id'];
    // $report_data = User::with('feedbackResponses','comments')->where('batch_id',$batch_id)->where('id','!=',$id)->get();
    $sql = "select * from users as u LEFT JOIN survey_feedback_responses as sfr on (u.id = sfr.submitted_by) where u.batch_id = ".$batch_id." and u.id != ".$id." and sfr.submitted_for = ".$id." order by sfr.question_id;";
        $chart_values = DB::select($sql);
        $chart_data = array();
       $q_id = array();
        foreach ($chart_values as  $value) { 
            $all_q_id=  array_push($q_id, $value->question_id);       
        }
        $u_q_id = array_unique($q_id);
         $avg = 0;
        foreach($u_q_id as $qid)
        {
            //echo $sql1 = "SELECT question_id, weightage as weightage FROM survey_feedback_responses where submitted_for = ".$id." and question_id = ".$qid."";die;
                    $avg_values =  DB::select("SELECT question_id, weightage as weightage FROM survey_feedback_responses where submitted_by = ".$id." and question_id = ".$qid."");
                    //echo  '<pre>'; print_r($avg_values);die;   
                   $sum =0;

                   foreach ($avg_values as $key => $value) {
                    // array_push($chart_data,$value->weightage);
                    $sum = $sum  + $value->weightage;
                    }
                    $avg_1 = $sum /  count($avg_values);
                    $avg = number_format((float)$avg_1, 2, '.', '');
                    array_push($chart_data,$avg);
                    // echo $avg;
                    
                       # code...
        }
        //dd($chart_data);
        //echo  '<pre>'; print_r($chart_data);die;   
          $datalist = implode(",", $chart_data);
            // }
            return response()->json([
                "status" => "success",
                "chart_values" => $datalist
            ]);
        

    }

    public function sendReport($id){

        User::setSelectedUserId($id);
        $usr_batch_data = User::select('batch_id')->where('id',$id)->get();
        $batch_id = $usr_batch_data[0]['batch_id'];
        $reportName =  "feedback_report".$id;
        $user_data = User::where('id',$id)->get()->toArray();
        // dd($user_data[0]['email']);
        User::setSelectedUserId($id);
        $report_data = User::with('feedbackResponses','comments')->where('batch_id',$batch_id)->where('id','!=',$id)->get()->toArray();


        foreach ($report_data as $key=>$data) {
           $dataArray[$key] = $data;    

        }
        $pdf = PDF::loadView('pages.pdf.feedback_report_pdf', compact('dataArray'));
        Storage::put($reportName, $pdf->output());
        try{
            $mail = Mail::to($user_data[0]['email'])->send(new FeedbackReport([$user_data,$reportName]));
            if($mail == ''){

                return back()->withStatus(__('Mail sent Successfully.'));
        
        }
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
        // $pdf->save(storage_path().'_filename.pdf');
        // return $pdf->download('report.pdf');

    }


    public function downloadReport($id){
        User::setSelectedUserId($id);
        $usr_batch_data = User::select('batch_id')->where('id',$id)->get();
        $batch_id = $usr_batch_data[0]['batch_id'];
        $reportName =  "feedback_report".$id;
        $report_data = User::with('feedbackResponses','comments')->where('batch_id',$batch_id)->where('id','!=',$id)->get()->toArray();


        foreach ($report_data as $key=>$data) {
           $dataArray[$key] = $data;    

        }
        $pdf = PDF::loadView('pages.pdf.feedback_report_pdf', compact('dataArray'));
        return $pdf->download('feedback_report.pdf');

        // User::setSelectedUserId($id);
        // $usr_batch_data = User::select('batch_id')->where('id',$id)->get();
        // $batch_id = $usr_batch_data[0]['batch_id'];
        // $report_data = User::with('feedbackResponses','comments')->where('batch_id',$batch_id)->where('id','!=',$id)->get();
        // $comments =  Comment::where('submitted_for', $id)->select('liked_comment','disliked_comment')->get();
        //return view('pages.detail_report_pdf',compact('report_data','id','comments'));
        //$pdf = PDF::loadView('pages.detail_report_pdf', compact('report_data','id','comments'));
        //return $pdf->download('feedback_report.pdf');

    }

    public function feedback_show(Request $request){
       $user_id = $request->user_id;
       $is_feedback_show = $request->is_feedback_show;

       DB::table('users')->where('id', $user_id)->update(['is_feedback_show'=>$is_feedback_show]);
       return response()->json(array(
                'message' => "Status Changed Successfully",   
                'status' => 200,
                ) , 200);
       
     
    }


}
