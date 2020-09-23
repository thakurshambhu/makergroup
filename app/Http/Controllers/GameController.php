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
        if(empty($game_data)){
            $gameDetails = new Game;
            $gameDetails->batch_id = $data['batch_id']?$data['batch_id']:'';
            $gameDetails->team_id = $data['team_id']?$data['team_id']:'';
            $gameDetails->save();
            $game_id = $gameDetails->id;
            for($i = 0; $i <= 5; $i++){
                $roundDetails = new Round;
                $roundDetails->game_id = $game_id;
                $roundDetails->final_bid = 0.00;
                $roundDetails->user_won = 0.00;
                $roundDetails->save();
                $round_id = $roundDetails->id;
                for ($j=0; $j <= 4; $j++) { 
                    $bidDetails = new Bidding;
                    $bidDetails->round_id = $round_id;
                    $bidDetails->user1_bid = 0.00;
                    $bidDetails->user_2_bid = 0.00;  
                    $bidDetails->save();
                }
            }
        }
        $game_data = Game::where(['batch_id'=> $data['batch_id'], 'team_id' =>$data['team_id']])->with('rounds','rounds.bidding')->first();
        return view('pages.bid_game_ajax', compact('game_data'));
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

        
        $user_1_final_bid = "0.00";
        $user_2_final_bid = "0.00";
    	if(!empty($data['user_1_final_bid'])){
    	$result =  str_replace( '$', '', $data['user_1_final_bid'] );
        $user_1_final_bid = $result;
    	$user = "user_1";
    	}else{
    		$result = str_replace( '$', '', $data['user_2_final_bid'] );
            $user_2_final_bid = $result;
    		$user = "user_2";
    	}
    	$winner_id = Team::where('id',$data['team_id'])->pluck($user); 

        // dd($winner_id[0]);
        $counter = 0;
       
            $user1_bid = '0.00';
            $user_2_bid = '0.00';
            if($data['check_user'] == 'user_1'){
                $user1_bid = $data['value'];
            }else{
                $user_2_bid = $data['value'];
            }
          
$dataArray = [
                'user1_bid'         => $user1_bid,
                'user_2_bid'       => $user_2_bid    ];

$user = Bidding::where('id', '=', $data['bid_id'])->first();
$user->update($dataArray);


        $round_id = Bidding::where(['id'=> $user->id])->pluck('round_id');
        $r_id= $round_id[0];
       // echo $r_id; exit;
        // if(!empty($data['user_1_final_bid']) || !empty($data['user_2_final_bid']))
        // {

            $dataArray1 = [
                'final_bid'         => $result ? $result: '0.00',
                'user_won'       => $winner_id[0] ? $winner_id[0] : '',
                'round_complete' => '1',
                 ];
                $user1 = Round::where('id', '=', $r_id)->first();
                $user1->update($dataArray1);
                // dd($user1);
            // Round::where('i', $r_id)
            // ->update([$roundDetails->final_bid = $result ? $result: '0.00', $roundDetails->user_won = $winner_id->$user?$winner_id->$user:'']); 

            
        // }
    	
    	
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
             $bid_data = Bidding::WhereIn('round_id',$round_ids)->OrderBy('round_id','DESC')->OrderBy('id','ASC')->get();
            // print_r($bid_data); exit;
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


    // public function getDisplayData(){
    //     $data = $this->request->all();

    //     $round_ids = array();
    //     $opponents = Team::with('user_1')->with('user_2')->where('id',$this->request->valueSelected)->get();
    //     $game_data = Game::with('rounds')->where(['batch_id'=> $data['selected_batch'], 'team_id' =>$data['valueSelected']])->first();
    //         foreach ($game_data->getRelation('rounds') as $key => $value) {
    //             $round_ids[] = $value->id;
    //         }

    //     // $game_data = Game::where(['batch_id'=> $data['selected_batch'], 'team_id' =>$data['valueSelected']])->with('rounds','rounds.bidding')->first();
    //     if(!empty($round_ids)){
    //          $bid_data = Bidding::WhereIn('round_id',$round_ids)->get();
        
    //     return response()->json([
    //         "status" => "success",
    //         "bid_data" => $game_data,
    //         "opponents" => $opponents,
    //     ]);

    //     }else{
    //         return response()->json([
    //         "status" => "error",
    //         'message'=>'something went wrong!'
    //         ]);        
    //     }
       
    // }


    public function getFinalResult(){
        $team_id = $this->request->valueSelected;
        $user_won1 = "";
        $user_won2 = "";
        $users = Team::select('user_1', 'user_2')->where('id',$team_id)->get()->toArray();
        foreach ($users as $key => $value) {
            $userArray[] = $value['user_1'];
            $userArray[] = $value['user_2'];

            $sql1 = "select sum(final_bid) as userwon1 from `rounds` where user_won=".$value['user_1']."";
            $final_result1 = DB::select($sql1);
            $user_won1 = $final_result1[0]->userwon1;  

            $sql2 = "select sum(final_bid) as userwon2 from `rounds` where user_won=".$value['user_2']."";
            $final_result2 = DB::select($sql2);           
            $user_won2 = $final_result2[0]->userwon2; 
        }
       
        $idList = implode(',', $userArray);

        $sql = "SELECT COUNT(user_won) as winning_count ,name as name,MAX(final_bid) as final_bid,MAX(user1_bid) as user1_bid, MAX(user_2_bid) as user2_bid FROM `rounds` as r  LEFT JOIN users as u ON r.user_won = u.id left join `biddings` as b on(r.id = b.round_id)  WHERE r.user_won IN (".$idList.") GROUP BY user_won";

        $final_result = DB::select($sql);

          $sql3 = "SELECT COUNT(user_won) as winning_count FROM `rounds` as r  WHERE r.user_won IN (".$idList.") GROUP BY user_won";
          $won_count = DB::select($sql3);
          
        

        // dd($final_result);
        return response()->json([
            "status" => "success",
            "final_result" => $final_result,
            "user_won1" => $user_won1,
            "user_won2" => $user_won2,
            "user1_winning_count" => $won_count[0]->winning_count,
            "user2_winning_count" => $won_count[1]->winning_count,
        ]);
        
    }
}

// SELECT COUNT(user_won) as winning_count ,name as name,MAX(final_bid) as final_bid FROM `rounds` as r  LEFT JOIN users as u ON r.user_won = u.id  WHERE r.user_won IN (15,14) GROUP BY user_won

