<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;
use App\User;
use App\Team;

class TeamController extends Controller
{
 	public function __construct(Request $request){
        $this->request = $request;
    }

    public function addTeamForm(){
    	$batches = Batch::all();
    	return view('pages.add_team',compact('batches'));
    }

    public function getBatchUsers(){
    	$users = User::where('batch_id',$this->request->selected_batch)->get();
    	return response()->json([
    		'status' => 'success',
    		'userlist' => $users
    	]);
    }

    public function saveTeams(){
        $teams      = $this->request->all();
        $batch_id   = $teams['batch_id'];
        unset($teams['_token']);
        unset($teams['batch_id']);
        try{

            foreach ($teams as $data){
                $team               = new Team;
                $team->batch_id     = $batch_id;
                $team->user_1       = $data[0];
                $team->user_2       = $data[1];
                $team->save();
            }

            $team_created = Batch::where('id',$batch_id)->update([
                'is_team_complete' => 1
            ]);
            return response()->json([
                "status"            => "success",
                "message"           => "Team Created Successfully"
                ]);
        }catch (\Exception $ex){
            if(empty($batch_id))
                {
                    return response()->json([
                        'status'            => 'error',
                        'code'              => $ex->getCode(),
                        'message'           => "You must select a batch."
                    ]);
                }elseif(empty($team->user_1)){
                    return response()->json([
                        'status'            => 'error',
                        'code'              => $ex->getCode(),
                        'message'           => "Please select users."
                    ]);
                }elseif(empty($team->user_2)){
                    return response()->json([
                        'status'            => 'error',
                        'code'              => $ex->getCode(),
                        'message'           => "Please select users."
                    ]);
                }else{
                    return response()->json([
                'status'            => 'error',
                'code'              => $ex->getCode(),
                'message'           => $ex->getMessage()
            ]);
                }
            
            
        } 
    }


    public function listTeams(){
        $teams = Team::paginate(10);
        return view('pages.list_teams',compact('teams'));
    }

    public function teamDetails($id){
        $team_users =Team::where('id',$id)->first(['user_1', 'user_2']);

        $userdetails = User::whereIn('id' , $team_users)->get();

        return view('pages.team_details',compact('userdetails','id'));

    }

    public function editTeam($id){
        $team_details = Team::where('id',$id)->first();
        $users = User::where('batch_id',$team_details->batch_id)->get();
        return view('pages.edit_team',compact('team_details','id','users'));
    }


    public function updateTeams(){

        $teams      = $this->request->all();
        $team_id   = $teams['team_id'];
        unset($teams['_token']);
        unset($teams['batch_id']);

        try{

           $updateTeam = Team::where('id',$team_id)->update([
            "user_1" => $teams['team_1'][0],
            "user_2" => $teams['team_1'][1],
           ]);
            
           return response()->json([
            'status' => 'success',
            'message' => 'Team Updated Successfully'
           ]);
            
        }catch (\Exception $ex){

            return response()->json([
                'status'            => 'error',
                'code'              => $ex->getCode(),
                'message'           => $ex->getMessage()
            ]);
            
        } 
    }


    public function deleteTeam($id){

      
      $deleteTeam = Team::where(['id'=>$id])->delete();
      if($deleteTeam){
       return back()->withStatus("Team Deleted Sucessfully");
       
       }else{
         return back()->withError("Something went wrong!");
       }

    }
}
