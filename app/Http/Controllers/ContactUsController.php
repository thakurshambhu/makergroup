<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use App\ContactUs;
use Mail; 
use App\Mail\ContactUsMail;
use DB;
use Illuminate\Http\Request;
use App\User;

class ContactUsController extends Controller
{
    public function __construct(Request $request){
        $this->request = $request;
    }


    public function getContactForm(){
        return view('contactUs.contact_form');
    }
    public function checkMpassword(Request $request){
        $password = DB::table('master_password')->get();
        //print_r(base64_decode($password[0]->password)); exit;
        $mpassword = $request->mpassword;
        if(base64_decode($password[0]->password) == $mpassword)
        {
            echo 'match'; 
        }else
        {
            echo 'not match';
        }
        exit;
    }

    /**
    * Contact Us 
    * @param name,email,subject,phone,Description
    * @return message
    * Created By: Parag Petkar
    * Created At: 13 Nov 2019  
    */

    public function saveContactUs()
    { 
        try{
            $validator              =  Validator::make($this->request->all(), [
                'name'              => 'required|max:100',
                'email'             => 'required|email',
                'phone_no'          => 'required|numeric',
                'description'       => 'max:255',
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }
            $ContactUs                  = new ContactUs;

            $ContactUs->name            = $this->request['name'];
            $ContactUs->email           = $this->request['email'];
            $ContactUs->phone_no        = $this->request['phone_no'];
            $ContactUs->description     = $this->request['description'];
            $ContactUs->subject         = 'Contact Us Mail';
            $ContactUs->status          = 'Open';
            $ContactUs->save();

            // echo "12";
           //echo $ContactUs->name ; exit;
            if(!empty($this->request['subject']))
            {
                $ContactUs->subject = $this->request['subject'];
            }

            $mail = Mail::send('emails.contact-us-email', ['data'=>$ContactUs], function ($m) use ($ContactUs) {
            $m->from('info@themakergroup.com', 'The Maker Group');

            $m->to($ContactUs->email)->subject($ContactUs->subject);
        });
           //  $mail = Mail::to($ContactUs->email)
           //  ->cc('ccuser@yopmail.com')
           // // ->subject($ContactUs->subject)
           //  ->send(new ContactUsMail($ContactUs));
            if($mail == ''){

                $mail = Mail::send('emails.contact-details-email', ['data'=>$ContactUs], function ($m) use ($ContactUs) {
            $m->from('info@themakergroup.com', 'The Maker Group');
            $m->to('paulvoisard@gmail.com')->subject('Contact Form Details');
            });
                // echo"34";
            return response()->json([
                'status'=>'success',
                'message'=>'Request Submitted Successfully!!'
            ]);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Something Went Wrong, Please Contact us on our alternate options'
            ]);
        }
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
    }

    /**
    * API Function to get Contact Us.
    * @param 
    * @return status, message, data
    * Created By: 
    * Created At:  
    */
    public function getContactUs()
    {
        try{
            $all_contactus = ContactUs::select('id','name','email')->get();

            return response()->json([
                'status' => 'success',
                'data'  => $all_contactus,
            ], 200);
        }catch (\Exception $ex){
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
                'error_details' => 'on line : '.$ex->getLine().' on file : '.$ex->getFile(),
            ], 200);
        }
    }

    public function checkuseractive(Request $request)
    {
        $email = $request->email;
        $users = User::where('email',$email)->get();
        if(isset($users[0]['complete_profile']) && $users[0]['complete_profile'] == '0')
        {
            echo "Not Activated";
        }else
        {
            echo "Activated";
        }
        exit;
            
    }
}
