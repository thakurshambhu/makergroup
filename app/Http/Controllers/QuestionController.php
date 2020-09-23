<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Exception;
use App\SurveyQuestion;
use App\Bucket;
use App\SurveyAnswer;

class QuestionController extends Controller
{

	public function __construct(Request $request){
        $this->request = $request;
    }
    public function showQuestions(){
        try{
            if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
            $questions = SurveyQuestion::paginate(10);    
            
                if($questions || count($questions)>0){
                    // dd($questions);
                   return view('pages.list_questions')->with('questions',$questions);
                }else{
                    return back()->withError(__('No questions available to display, Please add some new questions.'));
                }
            }else{
                return view ('unauthorized');
            }
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        } 
    }



    public function getAddQuestionForm(){
        $buckets = Bucket::all();
        return view("pages.add_question",compact('buckets'));
        
    }


    /**
    * Save questions
    * @param name,question,questionStatus,survey,bucket
    * @return message
    * Created By: Parag Petkar
    * Created At: 16 Nov 2019  
    */

    public function saveQuestions()
    {
        try{
            $validator              	=  Validator::make($this->request->all(), [
                'Name'              	=> 'required|max:100',
                'question'             	=> 'required|max:200',
                'questionStatus'        => 'required',
                'survey'      			=> 'required',
                'bucket'       			=> 'required',
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }
            $addQuestion                  	      = new SurveyQuestion;
            $addQuestion->name            	      = trim($this->request->Name);
            $addQuestion->question                = $this->request->question;
            $addQuestion->question_status         = $this->request->questionStatus;
            $addQuestion->survey         	      = $this->request->survey;
            $addQuestion->bucket_id     		  = $this->request->bucket;
            $addQuestion->save();

            $answeRating                          = new SurveyAnswer;
            $answeRating->question_id             = $addQuestion->id;
            $answeRating->strongly_agree          = $this->request->strongly_agree;
            $answeRating->agree                   = $this->request->agree;
            $answeRating->neutral                 = $this->request->neutral;
            $answeRating->disagree                = $this->request->disagree;
            $answeRating->strongly_disagree       = $this->request->strongly_disagree;
            $answeRating->save();

            return back()->withStatus(__('Question successfully updated.'));
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
    }



    /**
    * Function to get page editing form.
    * @param
    * @return status, message, data
    * Created By: Parag Petkar
    * Created At: 14 Nov 2019 
    */
    public function editQuestion($id)
    {
        try{
            $questions = SurveyQuestion::where('id',$id)->first();
            $buckets = Bucket::all();
            $answer_ratings = SurveyAnswer::where('question_id',$id)->first();
            // dd($answer_ratings);    
            return view("pages.edit_question",compact('questions','id','buckets','answer_ratings'));
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
    }

    public function updateQuestions($id){
         $question = SurveyQuestion::where('id',$id)->get();
         if(empty($question)){
            return back()->withError(__('Something went wrong!'));
    }else{

        try{
            $validator                  =  Validator::make($this->request->all(), [
                'Name'                  => 'required|max:100',
                'question'              => 'required|max:200',
                'questionStatus'        => 'required',
                'survey'                => 'required',
                'bucket'                => 'required',
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }

            // dd($this->request->all());
            $page = SurveyQuestion::where('id',$id)->update([
                'name'                  => trim($this->request->Name),
                'question'              => $this->request->question,
                'question_status'       => $this->request->questionStatus,
                'survey'                => $this->request->survey,
                'bucket_id'             => $this->request->bucket,
                
            ]);

            $answers = SurveyAnswer::where('question_id',$id)->update([
                'question_id'           => $id,
                'strongly_agree'        => $this->request->strongly_agree,
                'agree'                 => $this->request->agree,
                'neutral'               => $this->request->neutral,
                'disagree'              => $this->request->disagree,
                'strongly_disagree'     => $this->request->strongly_disagree,
            ]);
            return back()->withStatus(__('Question successfully updated.'));
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
        
    }
}

public function deleteQuestion($id){
    $deleteQuestion = SurveyQuestion::where('id', $id)->delete();
    $deleteOptions  = SurveyAnswer::where('question_id',$id)->delete();
            return back()->withStatus(__('Question successfully Deleted.'));
}
}






