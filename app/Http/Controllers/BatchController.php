<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Batch;

class BatchController extends Controller
{
public function __construct(Request $request){
        $this->request = $request;
    }

   	public function getBatchForm(){
   		$_batch_id = Batch::orderBy('id', 'DESC')->limit(1)->first();
      $last_batch_id = $_batch_id['id'];
   		$userlist = User::where([
                  'role_id'              =>3,
                
      ])
      ->where(function ($query){
         $query->WhereNull('batch_id');
        })
      ->get();
   		return view('pages.add_batch',compact('userlist','last_batch_id'));
   	}


   	public function saveBatch(){

   		$newbatch_id         = $this->request->batch_id+1;
   		$userids             = $this->request['user'];
      $batch_name          = $this->request['batch_name'];
        $batch             = new Batch;
        // $batch->id         = $newbatch_id;
        $batch->batches    = $batch_name." ".$newbatch_id;
        $batch->save();
        $batch_id = $batch->id;
        if($batch_id)
        $userlist          = User::whereIn('id',$userids)->update([
          'batch_id'       =>$batch_id
        ]);

   		return response()->json(['status'=>"success"]);
   	}

   	public function showBatch(){
   		$batchlist = Batch::paginate(10);

   		return view('pages.list_batch' ,compact('batchlist'));
   	}


    public function showBatchDetails($id){
      $users = User::where('batch_id',$id)->get();
      return view('pages.batch_details' ,compact('users','id'));
    }

    public function batchDetails(){
      return User::select('name','email')->where('batch_id', $this->request->batch_id)->get();
    }

    public function editBatch($id){

      $batch_data          = Batch::where(['id' =>$id])->get();

      $userlist           = User::where([
                            'role_id'             =>3,
                            'is_profile_complete' => 1,])
                            ->where(function ($query) use ($id){
                            $query->where('batch_id', $id)
                            ->orWhereNull('batch_id',NULL);})
                            ->orderBy('batch_id','DESC')
                            ->get();
        return view('pages.edit_batch',compact('userlist','id','batch_data'));
    }

    public function updateBatch(){
      try{
        $batch_update         = Batch::where('id',$this->request->batch_id)->update([
          'batches'        =>$this->request->batch_name,          
            ]);
      $clear_previous_users = User::where('batch_id',$this->request->batch_id)->update(['batch_id'=>NULL]);
      if(!empty($this->request->user)){
          $userids          = $this->request->user;
          $userlist         = User::whereIn('id',$userids)->update([
          'batch_id'        =>$this->request->batch_id
        ]);
        return response()->json(['status'=>"success"]);
      }else{
        return response()->json(['status'=>"error"]);
      }

      }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        } 
    }


    public function deleteBatch($id){

      $clear_batch_users = User::where('batch_id',$id)->update(['batch_id'=>NULL]);
      $deleteBatch = Batch::where(['id'=>$id])->delete();
      if($deleteBatch){
       return back()->withStatus("Batch Deleted Sucessfully");
       
       }else{
         return back()->withError("Something went wrong!");
       }

    }
}
