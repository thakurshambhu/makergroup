<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPage;
use App\Batch;
use App\Team;
use App\Game;
use App\Round;
use App\Bidding;
use Session;
use DB;
// use Auth;

class GameController extends Controller
{

	public function __construct(Request $request){
        $this->request = $request;
    }


    public function getIndexFromId($id){
    	$index = substr($id, 7);
    	return $index;
    	

    }

    public function getGamePage(){

    	$DetailPages = DetailPage::all();
    	$batches = Batch::all();
    	return view('pages.bid_game',compact('DetailPages','batches'));
    }


    public function getTeams(){
    	$teams = Team::with('user_1')->with('user_2')->where('batch_id',$this->request->selected_batch)->get();
    	return response()->json([
    		"status" => "success",
    		"userlist" => $teams
    	]);
    }


    public function getOpponents(){

    	$opponents = Team::with('user_1')->with('user_2')->where('id',$this->request->valueSelected)->get();
    	if(isset($opponents)){
    	return response()->json([
    		"status" => "success",
    		"opponents" => $opponents
    	]);
    }else{
    	return response()->json([
    		"status" => "error",
    		"opponents" => ""
    	]);
    }
    }

    public function getGameData(){
        $data = $this->request->all();
        $game_data = Game::where(['batch_id'=> $data['batch_id'], 'team_id' =>$data['team_id']])->with('rounds','rounds.bidding')->first();
        // echo $game_data['id']; exit;
        // echo "<pre>";
        return $game_data;
       //  $sql = "SELECT * FROM rounds AS rd LEFT JOIN biddings as bd on rd.id = bd.round_id WHERE rd.game_id = ".$game_data['id'];
       //  $user_reports = DB::select($sql);
       // return $user_reports;

        





    }


    public function saveBidData(){ 

    	$data = $this->request->all();
    	$game_id = Game::where(['batch_id'=> $data['batch_id'], 'team_id' =>$data['team_id']])->pluck('id');
    	if(empty($game_id)){
        $gameDetails = new Game;
        $gameDetails->batch_id = $data['batch_id']?$data['batch_id']:'';
        $gameDetails->team_id = $data['team_id']?$data['team_id']:'';
        $gameDetails->save();
    	$game_id = $gameDetails->id;
    }    

        

    	if(!empty($data['user_1_final_bid'])){
    	$result =  str_replace( '$', '', $data['user_1_final_bid'] );
    	$user = "user_1";
    	}else{
    		$result = str_replace( '$', '', $data['user_2_final_bid'] );
    		$user = "user_2";
    	}
    	$winner_id = Team::where('id',$data['team_id'])->first($user);    
    	

        if(!Session::has('roundId'))
        {   
            $roundDetails = new Round;
            $roundDetails->game_id = $game_id ? $game_id[0]:'';
            $roundDetails->final_bid = $result ? $result: '0.00';
            $roundDetails->user_won = $winner_id->$user?$winner_id->$user:'';
	       $roundDetails->save();
           Session::put('roundId', $roundDetails->id);

        }
        $getRondId = Session::get('roundId');
		//dd($data['name']);
        $counter = 0;
     //    dd($data['formData']);
    	// foreach ($data['formData'] as $formdata) {
            $bidDetails = new Bidding;
            $bidDetails->round_id = $getRondId;
            if($counter%2 == 0){
                 
            $bidDetails->user1_bid = $data['value'];

            }else{
              $bidDetails->user2_bid = $data['value'];  
            }
            $bidDetails->save();
    	// }

        if(!empty($data['user_1_final_bid']) || !empty($data['user_2_final_bid']))
        {
            DB::table('rounds')
            ->where('id', $getRondId)
            ->update(['final_bid' => $result]); 

            session()->forget('roundId');
            
        }
    	
    	
    }



    public function playbackGamePage(){

        $DetailPages = DetailPage::all();
        $batches = Batch::all();
        return view('pages.display_bid_game',compact('DetailPages','batches'));
    }



    public function getDisplayData(){
        $data = $this->request->all();
        $round_ids = array();
        $opponents = Team::with('user_1')->with('user_2')->where('id',$this->request->valueSelected)->get();
        $game_data = Game::with('rounds')->where(['batch_id'=> $data['selected_batch'], 'team_id' =>$data['valueSelected']])->first();
            foreach ($game_data->getRelation('rounds') as $key => $value) {
                $round_ids[] = $value->id;
            }
        if(!empty($round_ids)){
             $bid_data = Bidding::WhereIn('round_id',$round_ids)->get();
        
        return response()->json([
            "status" => "success",
            "bid_data" => $bid_data,
            "opponents" => $opponents,
        ]);

        }else{
            return response()->json([
            "status" => "error",
            'message'=>'something went wrong!'
            ]);        
        }
       
    }


    public function getFinalResult(){
        $team_id = $this->request->valueSelected;

        $users = Team::select('user_1', 'user_2')->where('id',$team_id)->get()->toArray();
        foreach ($users as $key => $value) {
            $userArray[] = $value['user_1'];
            $userArray[] = $value['user_2'];
        }
        $idList = implode(',', $userArray);

        $sql = "SELECT COUNT(user_won) as winning_count ,name as name,MAX(final_bid) as final_bid FROM `rounds` as r  LEFT JOIN users as u ON r.user_won = u.id  WHERE r.user_won IN (".$idList.") GROUP BY user_won";

        $final_result = DB::select($sql);

        // dd($final_result);
        return response()->json([
            "status" => "success",
            "final_result" => $final_result
        ]);
        
    }
}

// SELECT COUNT(user_won) as winning_count ,name as name,MAX(final_bid) as final_bid FROM `rounds` as r  LEFT JOIN users as u ON r.user_won = u.id  WHERE r.user_won IN (15,14) GROUP BY user_won

