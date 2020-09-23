<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\User;
use Carbon\Carbon;
use App\ContactUs;
use Mail;
use App\Mail\ContactUsMail;
use DB;
use PHPMailer\PHPMailer;
use Illuminate\Support\Facades\URL;
class ProfileController extends Controller
{
    private $profile_picture_upload_path;

    public function __construct(){
        
        $this->profile_picture_upload_path = '/uploads/images/profile_picture/';
    }

    public function profile_info($id){
       
           $profile_info = User::where('id', $id)->get();
           return view('users.profile_info',compact('profile_info'));
        
        

    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {      
        //echo auth()->user()->complete_profile; exit;
         //dd($request->all());die;

        if(auth()->user()->complete_profile == 1)
        {
           
            auth()->user()->update($request->all());
            return back()->withStatus(__('Profile successfully updated.'));
        }
        else
        {
           
            auth()->user()->update($request->all());
            $url = URL::to('/');
            $user = [
                'email'     =>  $request->email,
                'name'      => $request->name,
                'company'      => $request->company,
                'division'      => $request->division,
                'title'      => $request->title,
                'manager'      => $request->manager_name,
                'training'      => $request->training,
                'with_who'      => $request->with_who,
                'when'      => $request->when_training,
                'negotiation'      => $request->negotiation,
                'negotiate_with'      => $request->negotiate_with,
                'variables'      => $request->variables,
                'negotiator'      => $request->negotiator,
                'why'      => $request->why,
                'why_not'      => $request->why_not,
                'enjoy_negotiation'      => $request->enjoy_negotiation,
                'why_enjoy'      => $request->why_enjoy,
                'why_not_enjoy'      => $request->why_not_enjoy,
                'why_not'      => $request->why_not,
                'effective_negotiator'      => $request->effective_negotiator,
                'subject'   =>  "Profile Notification"
            ];
           
            $mail = Mail::send('emails.profile-submition', ['data'=>$user,'url'=>$url], function ($m) use ($user) {
                $m->from('info@themakergroup.com', 'The Maker Group');

                $m->to('shambhu.smartdata@gmail.com')->subject('Profile Notification');
            });
           
            // $mail             = new PHPMailer\PHPMailer(); // notice the \  you have to use root namespace here
            // try {
            //     $mail->isSMTP(); // tell to use smtp
            //     $mail->CharSet = "utf-8"; // set charset to utf8
            //     $mail->SMTPAuth = true;  // use smpt auth
            //     $mail->SMTPSecure = "tls"; // or ssl
            //     $mail->Host = "smtp.gmail.com";
            //     $mail->Port = 587; // most likely something different for you. This is the mailtrap.io port i use for testing. 
            //     $mail->Username = "shambhu.smartdata@gmail.com";
            //     $mail->Password = "cnliyyajhevuxtkm";
            //     $mail->setFrom('shambhu.smartdata@gmail.com', 'The Maker Group');
            //     $mail->Subject = "Profile Notification";
            //     $mail->MsgHTML("This is a test");
            //     $mail->addAddress("shambhu.thakur@smartdatainc.net");
            //     $mail->send();
            // } catch (phpmailerException $e) {
            //     dd($e);
            // } catch (Exception $e) {
            //     dd($e);
            // }
            //die('success');
            return back()->withStatus(__('Profile successfully saved. Your account will be activated within 24Hrs.'));
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }



    /**
    * Function to Add or Update User Profile Image
    * @param
    * @return status, message, data, image_path
    * Created By: Parag Petkar
    * Created At: 14 Nov 2019 
    */
    public function updateProfileImage(Request $request){
        // dd($request->all());
        try{
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'profile_pic' => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validator->fails()) {
                # code...
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }

            $userData = User::where('id',$request->user_id)->first();
            // dd($userData);

            if (!empty($userData['photo_url'])) {
                
                if(file_exists(public_path($this->profile_picture_upload_path.$userData['photo_url']))) {
                    unlink(public_path($this->profile_picture_upload_path.$userData['photo_url']));
                }
            }

            $file = $request->file('profile_pic');

            $file_title = $file->getClientOriginalName();

            $file_title = str_replace(" ","",$file_title);

            $file_name = strtotime(Carbon::now()).'_'.$file_title;

            $file->move(public_path($this->profile_picture_upload_path), $file_name);

            $responseUserData = User::where('id', $request->user_id)->update([
                'photo_url'=> $file_name
            ]);
            return back()->withStatus(__('Image successfully updated.'));
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
    }
}
