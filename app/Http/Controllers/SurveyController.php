<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DetailPage;
use App\SurveyQuestion;
use App\SurveyFeedbackResponse;
use App\User;
use App\SurveyResponse;
use App\SurveyAnswer;
use App\Comment;
use Auth;
use Validator;
use Exception;
use DB;

class SurveyController extends Controller
{
   public function __construct(Request $request){
        $this->request = $request;
    }


    public function getIdfromName($name){
        $question_id = substr($name, 8);
        return $question_id;
        
    }




    public function getPreWorkshopSurvey(){
    $DetailPages                    = DetailPage::all();
    $questions                      = $this->getSurveyPageData();
    $questions['DetailPages']       = $DetailPages;
        // return view('pages.pre-workshop-survey')->with($questions);
    return view('pages.pre-workshop-survey-2')->with($questions);
    }





    public function loadQuestions(){
        $DetailPages                = DetailPage::all();
        // $questions                  = $this->getSurveyPageData($this->request->page,$this->request->previous);
        $questions                  = $this->getSurveyPageData($this->request->page);
        $questions['DetailPages']   = $DetailPages;
        // return view('pages.pre-workshop-survey-ajax')->with($questions);
        return view('pages.pre-workshop-survey-ajax-2')->with($questions);
    }

    protected function getSurveyPageData($page=null){
        $user = \Auth::user();
        SurveyQuestion::$user_id = $user->id;
        $profileQuestions = SurveyQuestion::with('survey_response')->select('question','id')->where('survey','Profile Survey')->OrderBy('id','ASC')->paginate(10);


        $currentPage = $profileQuestions->currentPage();
        $lastPage = $profileQuestions->lastPage();
        $nextPage = ($currentPage+1 > $lastPage)?$lastPage:($currentPage+1);
        $previousPage = ($currentPage>1)?(($currentPage-1>=$lastPage)?$lastPage-1:$currentPage-1):1;

        $responseArray = array('profileQuestions' => $profileQuestions, 'currentPage' => $currentPage, 'lastPage' => $lastPage, 'nextPage' => $nextPage, 'previousPage'=>$previousPage,'submit_count'=> 0);

        // dd($profileQuestions);
        // echo "<pre>";
        // print_r($profileQuestions);
        // exit;
        return $responseArray;
    }



    /*protected function getSurveyPageData($page=null, $previous=false){
        
        $already_submitted_questions = SurveyResponse::where('user_id',Auth::user()->id)->pluck('question_id');
        $submit_count = count($already_submitted_questions);
        if(!empty($already_submitted_questions) && $previous==0){
        $profileQuestions           = SurveyQuestion::select('question','id')->where('survey','Profile Survey')->whereNotIn('id', $already_submitted_questions)->paginate(10);
        }elseif($previous){

          $profileQuestions           = SurveyQuestion::select('question','id')->whereIn('id', $already_submitted_questions)->where('survey','Profile Survey')->OrderBy('id','DESC')->paginate(10);   
        }
        else{
        $profileQuestions           = SurveyQuestion::select('question','id')->where('survey','Profile Survey')->paginate(10);
        }
        // dd($profileQuestions);
        $nextPageCount           = SurveyQuestion::select('question','id')->where('survey','Profile Survey')->whereNotIn('id', $already_submitted_questions)->count();
        $previousPageCount           = SurveyQuestion::select('question','id')->whereIn('id', $already_submitted_questions)->where('survey','Profile Survey')->count();
        $count                      = SurveyQuestion::count();
       // dd($count);
        $currentPage                = round((($count-$previousPageCount)/10));
        $lastPage                   = round($count/10);
        // $nextPage                   =  ($currentPage==$lastPage)?null:($currentPage + 1); 
       $nextPage                   =  ($currentPage==$lastPage)?null:($currentPage+1); 
        $previousPage               = round((($count-$previousPageCount)/10))-1;
        if($previous)
            $previousPage               = $previousPage+1;

        $responseArray = array('profileQuestions' => $profileQuestions, 'currentPage' => $currentPage, 'lastPage' => $lastPage, 'nextPage' => $nextPage, 'previousPage'=>$previousPage, 'previous'=>$previous,'count' => $count,'submit_count'=> $submit_count);

        return $responseArray;
    }*/





    public function saveProfileSurvey(){
        $formdata                   = $this->request->all();
        $user_id                    = Auth::user()->id;
        unset($formdata['_token']);
        foreach ($formdata as $key  => $value) {
        $name                       = $key;
        $response                   = $value;
        $question_id                = $this->getIdfromName($name);
        $weightage                  = SurveyAnswer::select($value)->where('question_id',$question_id)->first();
        $question_id                = $this->getIdfromName($name);  // Function for getting Id from name

            $responseDetails        = SurveyResponse::updateOrInsert(
            ['user_id'              => $user_id, 'question_id' => $question_id ],
            ['response'             => $value,
             'weightage'            => $weightage[$response]?$weightage[$response]:'0'
            ]
            );
        }
        if($responseDetails){
            return response()->json([
                "status"            => "success"
            ]);
        }else{
            return response()->json([
                "status"            => "error"
            ]);
        }
    }







    public function submitProfileSurvey(){

        $formdata                   = $this->request->formData;
        $user_id                    = Auth::user()->id;
        unset($formdata[0]);
        foreach ($formdata as $key => $value) {
       
        $name                       = $value['name'];
        $response                   = $value['value'];
        $question_id                = $this->getIdfromName($name);


        $weightage                  = SurveyAnswer::select($response)->where('question_id',$question_id)->first();


        $responseDetails            = SurveyResponse::updateOrInsert([
        'user_id'                   => $user_id, 
        'question_id'               => $question_id 
        ],
        [
        'response'                  => $value['value'],
        'weightage'                 => $weightage[$response]?$weightage[$response]:'0'
        ]);
        }

       $toggle_profile = User::where('id',$user_id)->update([
                        "is_profile_complete" => 1
                        ]); 

        if($responseDetails){
            return response()->json([
                "status"           => "success"
            ]);
        }else{
            return response()->json([
                "status"           => "error"
            ]);
        }
    }









    // FedBack Survey Section

    public function feedbackDashboard(){
        $user_batch_id             = Auth::user()->batch_id;
        $user_id                   = Auth::user()->id;
        $getid                     = [];
        $batch_users               = User::where('batch_id', $user_batch_id)->where('id','!=',Auth::user()->id)->get();
        $batch_users_ids = [];
        
        foreach ($batch_users as $ids) {
            $batch_users_ids[]     = $ids->id;
        }
        $already_submitted_user    = SurveyFeedbackResponse::whereIn('submitted_for',$batch_users_ids)->where('submitted_by',$user_id)->distinct()->pluck('submitted_for');
        foreach ($already_submitted_user as $key => $value) {
            array_push($getid, $value);
        }
        $this->request->session()->put('submittedUsers', $getid);
        return view('pages.feedback_dashboard',compact('batch_users'));

    }







    public function getFeedBackSurvey($id){
         $userid                    = $id;
         $submitted_by              = Auth::user()->id;
         $DetailPages               = DetailPage::all();
         $feedbackQuestions         = SurveyQuestion::inRandomOrder()->select('question','id')->where('survey','Feedback Survey')->get();
         $count                    = $feedbackQuestions->count();


         $sql = "SELECT * FROM `survey_feedback_responses` as sfr left join `survey_questions` as sq on(sfr.question_id = sq.id) WHERE sfr.submitted_by = $submitted_by and sfr.submitted_for = $id";
        $survey_responses = DB::select($sql);

        $sql1 = "SELECT * FROM `comments` as c  WHERE c.submitted_by = $submitted_by and c.submitted_for = $id";
        $comments = DB::select($sql1);


        // echo "<pre>";
        // print_r($comments); exit;

         $user_batch_id             = Auth::user()->batch_id;
        $user_id                   = Auth::user()->id;
        $getid                     = [];
        $batch_users               = User::where('batch_id', $user_batch_id)->where('id','!=',Auth::user()->id)->get();
        $batch_users_ids = [];
        
        foreach ($batch_users as $ids) {
            $batch_users_ids[]     = $ids->id;
        }
        $already_submitted_user    = SurveyFeedbackResponse::whereIn('submitted_for',$batch_users_ids)->where('submitted_by',$user_id)->distinct()->pluck('submitted_for');
        foreach ($already_submitted_user as $key => $value) {
            array_push($getid, $value);
        }
        $this->request->session()->put('submittedUsers', $getid);


         return view('pages.feedback_survey',compact('DetailPages','feedbackQuestions','userid','submitted_by','count','batch_users','survey_responses','comments'));
    }







    public function savefeedbackForm(){
         // $inputs = count($this->request->formdata[8]);
         // $comment_1_array = $inputs - 2;
         // $comment_2_array = $inputs - 2;

         
        // try{
            // $validator  =  Validator::make($this->request->formdata[$comment_1_array],[
            //     'comment_1' => ['required', 'string', 'max:255'],
            //     // 'comment_2' => ['required', 'string', 'max:255']
            // ]);

            // if ($validator->fails()) {
            //     foreach ($validator->messages()->getMessages() as $field_name => $messages){
            //         throw new Exception($messages[0], 1);
            //     }
            // }
       
        foreach($this->request->formdata  as $data){
            $name                               = $data['name'];
            $response                           = $data['value'];
            $question_id                        = $this->getIdfromName($name);
            $weightage                          = SurveyAnswer::select($response)->where('question_id',$question_id)->first();
            $feedback_details                   = new SurveyFeedbackResponse;
            $feedback_details->question_id      = $question_id;
            $feedback_details->response         = $data['value']?$data['value']:'';
            $feedback_details->submitted_for    = $this->request->submitted_for?$this->request->submitted_for:'';
            $feedback_details->submitted_by     = $this->request->submitted_by?$this->request->submitted_by:'';
            $feedback_details->weightage        = $weightage[$response]?$weightage[$response]: '0';
            $feedback_details->save();

            $this->request->session()->push('submittedUsers', $this->request->submitted_for);
        }
         $comments = new Comment;
            $comments->submitted_by             = $this->request->submitted_by?$this->request->submitted_by:'';
            $comments->submitted_for            = $this->request->submitted_for?$this->request->submitted_for:'';
            $comments->liked_comment            = $this->request->comment_1?$this->request->comment_1:'';
            $comments->disliked_comment         = $this->request->comment_2?$this->request->comment_2:'';
            $comments->save();

            return response()->json([
                "status"                        => "success",
                "message"                       => "Resposne Submitted Sucessfully!",
            ]);
        // }catch (\Exception $ex){
        //     return response()->json([
        //         "status"                        => "error",
        //         'message'                       => $ex->getMessage(),

        //     ]);
        // }

        }


        public function updatefeedbackForm(){
       
        foreach($this->request->formdata  as $data){
            $name                               = $data['name'];
            $response                           = $data['value'];
            $question_id                        = $this->getIdfromName($name);

            $weightage                          = SurveyAnswer::select($response)->where('question_id',$question_id)->first();
            
            $response         = $data['value']?$data['value']:'';
            $submitted_for    = $this->request->submitted_for?$this->request->submitted_for:'';
            $submitted_by     = $this->request->submitted_by?$this->request->submitted_by:'';
            $weightage        = $weightage[$response]?$weightage[$response]:'0';
            

            $dataArray = [
                'response'         => $response,
                'weightage'       =>  $weightage ];

                $user = SurveyFeedbackResponse::where(['submitted_for'=> $submitted_for,'submitted_by'=> $submitted_by,'question_id'=> $question_id])->first();
                $user->update($dataArray);

            $this->request->session()->push('submittedUsers', $this->request->submitted_for);
        }
         
            $submitted_by             = $this->request->submitted_by?$this->request->submitted_by:'';
            $submitted_for            = $this->request->submitted_for?$this->request->submitted_for:'';
            $liked_comment            = $this->request->comment_1?$this->request->comment_1:'';
            $disliked_comment         = $this->request->comment_2?$this->request->comment_2:'';
            

            $dataArray1 = [
                'liked_comment'         => $liked_comment,
                'disliked_comment'       => $disliked_comment];

                $users = Comment::where(['submitted_for'=> $submitted_for,'submitted_by'=> $submitted_by])->first();
                $users->update($dataArray1);
            return response()->json([
                "status"                        => "success",
                "message"                       => "Resposne Submitted Sucessfully!",
            ]);
        
        }






        public function togglefeedbackSection(){
            $mode = $this->request->mode;
            $user_id = $this->request->user;
                if($mode == "true"){

                    $toggle_profile = User::where('id',$user_id)->update([
                        "show_feedback" => 1
                    ]); 
                    // dd($toggle_profile);
                    if ($toggle_profile) {
                        return response()->json([
                            "status" => "success"
                        ]);
                    } else {
                       
                        return response()->json([
                             "status" => "in true error"
                        ]);
                           
                    }
                    
                }

                if($mode == "false"){
                    $toggle_profile = User::where('id',$user_id)->update([
                        "show_feedback" => 0
                    ]);

                    if ($toggle_profile) {
                        return response()->json([
                            "status" => "success"
                        ]);
                    } else {
                        return response()->json([
                             "status" => "error"
                        ]);
                    }
                    
                }


        }


        public function resetWorkshopSurvey(){
            $batch_id = $this->request->batch;

            $reset_survey = User::where('batch_id',$batch_id)->update(['is_profile_complete'=>0,'batch_id'=>NULL]);
            
              $users = User::where('batch_id',$batch_id)->get()->all();
             
              foreach($users as $user)
              {                 
                    $deleteResponses = SurveyResponse::where('user_id', $user->id)->delete();       

              }              
              
               if($reset_survey == 0 || $reset_survey == 1) {
                        return response()->json([
                            "status" => "success"
                        ]);
                    } else {
                       
                        return response()->json([
                             "status" => "in true error"
                        ]);
                           
                    }
           

        }
        
}

