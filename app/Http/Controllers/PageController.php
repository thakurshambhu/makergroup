<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Exception;
use Storage;
use File;

use App\StaticPage;
use App\Bucket;
use App\DetailPage;
use App\User;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->profile_picture_upload_path = '/uploads/images/detail_page_icons/';
    }

    /**
     * Display all the pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
       
        if(view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }else{
        return abort(404);
        }
    }

    /**
     * Display all new users
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function newaccounts()
    {
        $users = User::where('complete_profile','0')->get();
        //print_r($users); exit;
        return view('users.newusers' ,compact('users'));
        
    }


// Active user account
    public function activeuser($userid)
    {
         $active_user         = User::where('id',$userid)->update([
          'complete_profile'        =>"1",          
            ]);
         if($active_user)
         {
            return redirect()->back()->with('message', 'User has been activated successfully!');
         }else
         {
            return redirect()->back()->with('message', 'There is some error, Please try again !');
         }
    }


/// Give and Remove access to a user for perworkshop survey
public function preworkshopAccess($userid)
{
    $users = User::where('id',$userid)->get();
    if($users[0]['preworkshop_survey'] == '1')
    {
        $status = '0';
    }else
    {
        $status = '1';
    }

    $preworkshop_status  = User::where('id',$userid)->update([
          'preworkshop_survey'        =>$status,          
            ]);
    if($preworkshop_status)
    {
        if($users[0]['preworkshop_survey'] == '0')
        {
            return redirect()->back()->with('status', 'You have given Pre workshop survey access to this User');
        }else
        {
            return redirect()->back()->with('status', 'You have remove Pre workshop survey access to this User');
        }
    }else
    {
        return redirect()->back()->with('status', 'There is some error, Please try again !');
    }
}

/// Give and Remove access to a user for Feedback survey
public function feedbackAccess($userid)
{
    $users = User::where('id',$userid)->get();
    if($users[0]['feedback_survey'] == '1')
    {
        $status = '0';
    }else
    {
        $status = '1';
    }

    $preworkshop_status  = User::where('id',$userid)->update([
          'feedback_survey'        =>$status,          
            ]);
    if($preworkshop_status)
    {
        if($users[0]['feedback_survey'] == '0')
        {
            return redirect()->back()->with('status', 'You have given Feedback survey access to this User');
        }else
        {
            return redirect()->back()->with('status', 'You have remove Feedback survey access to this User');
        }
    }else
    {
        return redirect()->back()->with('status', 'There is some error, Please try again !');
    }
}


/// Give and Remove access to a user for Feedback survey
public function planningtoolsAccess($userid)
{
    $users = User::where('id',$userid)->get();
    if($users[0]['planning_tools'] == '1')
    {
        $status = '0';
    }else
    {
        $status = '1';
    }

    $preworkshop_status  = User::where('id',$userid)->update([
          'planning_tools'        =>$status,          
            ]);
    if($preworkshop_status)
    {
        if($users[0]['planning_tools'] == '0')
        {
            return redirect()->back()->with('status', 'You have given Planning Tools access to this User');
        }else
        {
            return redirect()->back()->with('status', 'You have remove Planning Tools access to this User');
        }
    }else
    {
        return redirect()->back()->with('status', 'There is some error, Please try again !');
    }
}



 /**
    * Function to get Home Page content editing form.
    * @param
    * @return status, message, data
    * Created By: Parag Petkar
    * Created At: 14 Nov 2019 
    */
    public function editPage($id)
    {
        try{
            $pageData = StaticPage::where('id',$id)->first();
            return view("pages.edit_page",compact('pageData','id'));
        }catch (\Exception $ex){
            
        }
    }


      /**
    * Function to Save Home page content.
    * @param
    * @return status, message, data
    * Created By: Parag Petkar
    * Created At: 14 Nov 2019 
    */

    public function savePage($id)
    {
        try{
            $validator                    =  Validator::make($this->request->all(), [
                'pageName'                => 'required|max:100',
                'pageTitle1'              => 'required|max:100',
                'pageTitle2'              => 'required|max:100',
                'pageTitle3'              => 'required|max:100',
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }
            $page = StaticPage::where('id',$id)->update([
                'name'         => $this->request->pageName,
                'title1'       => $this->request->pageTitle1,
                'title2'       => $this->request->pageTitle2,
                'title3'       => $this->request->pageTitle3,
                'description1' => $this->request->pageDescription1,
                'description2' => $this->request->pageDescription2,
                'description3' => $this->request->pageDescription3,
                'status'       => $this->request->pageStatus
            ]);
            return back()->withStatus(__('Page successfully updated.'));
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        }
    }

     /**
    * Function to get list of pages.
    * @param
    * @return status, message, data
    * Created By: Parag
    * Created At: 15 Nov 2019 
    */
    public function showPages(){
        try{
            $staticPages = StaticPage::paginate(5);    
            
            if($staticPages || count($staticPages)>0){
                // dd($pages);
               return view('pages.list_pages')->with('staticPages',$staticPages);
            }
        
        }catch (\Exception $ex){
            return back()->withError(($ex->getMessage()));
        } 
    }

     /**
    * Function to get list of Detail pages.
    * @param
    * @return view list of detail page
    * Created By: Parag
    */
    public function detailPageList(){
        $pageDetails = DetailPage::all();
        return view('pages.list_page_details',compact('pageDetails'));
    }

     /**
    * Function to get form for adding Detail pages.
    * @param
    * @return view form for adding detail page
    * Created By: Parag
    */
    public function addDetailPage(){
        $homePageContents = StaticPage::all();
        return view('pages.add_page_details', compact('homePageContents'));
    }

    /**
    * Function to store Detail pages.
    * @param
    * @return message, status
    * Created By: Parag
    */
    public function saveDetailsPage(){
        // dd($this->request->file('pageKeyFeature1Icon'));
        try{
            $validator                         =  Validator::make($this->request->all(), [
                'pageName'                     => 'required',
                'pageTitle'                    => 'required',
                'pageSubtitle'                 => 'required',
                'inputDescription'             => 'required',
                'pageKeyFeature1'              => 'required',
                'pageKeyFeature2'              => 'required',
                'pageKeyFeature3'              => 'required',
                'pageKeyFeature4'              => 'required',
                'pageKeyFeature1Icon'          => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature2Icon'          => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature3Icon'          => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature4Icon'          => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048',

            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }

                $icon1              = $this->request->file('pageKeyFeature1Icon');
                if (!empty($icon1)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon1))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon1));
                }    
                $extension          = $icon1->getClientOriginalExtension();
                $iconName1          = $icon1->getClientOriginalName();
                $path               = $icon1->move(public_path($this->profile_picture_upload_path), $iconName1);
                }
    
                $icon2              = $this->request->file('pageKeyFeature2Icon');
                 if (!empty($icon2)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon2))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon2));
                } 
                $extension          = $icon2->getClientOriginalExtension();
                $iconName2          = $icon2->getClientOriginalName();
                $path               = $icon2->move(public_path($this->profile_picture_upload_path), $iconName2);
                }
    
                $icon3              = $this->request->file('pageKeyFeature3Icon');
                 if (!empty($icon3)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon3))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon3));
                } 
                $extension          = $icon3->getClientOriginalExtension();
                $iconName3          = $icon3->getClientOriginalName();
                $path               = $icon3->move(public_path($this->profile_picture_upload_path), $iconName3);
                }
        
                $icon4              = $this->request->file('pageKeyFeature4Icon');
                 if (!empty($icon4)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon4))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon4));
                } 
                $extension          = $icon4->getClientOriginalExtension();
                $iconName4          = $icon4->getClientOriginalName();
                $path               = $icon4->move(public_path($this->profile_picture_upload_path), $iconName4);
                }

                $page               = DetailPage::create([
                'page_name'         => $this->request->pageName,
                'title'             => $this->request->pageTitle,
                'subtitle'          => $this->request->pageSubtitle,
                'description'       => $this->request->inputDescription,
                'keyfeature1'       => $this->request->pageKeyFeature1,
                'kfIcon1'           => $iconName1,
                'keyfeature2'       => $this->request->pageKeyFeature2,
                'kfIcon2'           => $iconName2,
                'keyfeature3'       => $this->request->pageKeyFeature3,
                'kfIcon3'           => $iconName3,
                'keyfeature4'       => $this->request->pageKeyFeature4,
                'kfIcon4'           => $iconName4,
                'client_quote'      => $this->request->pageClientQuote,
                'status'            => $this->request->pageStatus
                ]);
                return response()->json([
                'status'            => 'success',
                'message'           => 'Detail Page successfully added'
                ]);
        }catch (\Exception $ex){
                return response()->json([
                'status'            => 'error',
                'code'              => $ex->getCode(),
                'message'           => $ex->getMessage()
            ]);
            }
    }
    

    /**
    * Function to get form for editing Detail pages.
    * @param
    * @return view form for edit detail page 
    * Created By: Parag
    */
    public function editDetailPage($id){
        try{
            $homePageContents = StaticPage::all();
            $pageData = DetailPage::where('id',$id)->first();
            return view("pages.edit_detail_page",compact('pageData','id','homePageContents'));
        }catch (\Exception $ex){
            
        }
        
    }

    /**
    * Function to update Detail pages.
    * @param id, form-data
    * @return message, status
    * Created By: Parag
    */
    public function updateDetailsPage($id){
            try{
            $validator                         =  Validator::make($this->request->all(), [
                'pageName'                     => 'required',
                'pageTitle'                    => 'required',
                'pageSubtitle'                 => 'required',
                'inputDescription'             => 'required',
                'pageKeyFeature1'              => 'required',
                'pageKeyFeature2'              => 'required',
                'pageKeyFeature3'              => 'required',
                'pageKeyFeature4'              => 'required',
                'pageKeyFeature1Icon'          => 'image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature2Icon'          => 'image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature3Icon'          => 'image|mimes:svg,jpeg,png,jpg,gif|max:2048',
                'pageKeyFeature4Icon'          => 'image|mimes:svg,jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages){
                    throw new Exception($messages[0], 1);
                }
            }

                $icon1              = $this->request->file('pageKeyFeature1Icon');
                if (isset($icon1)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon1))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon1));
                }    
                $extension          = $icon1->getClientOriginalExtension();
                $iconName1          = $icon1->getClientOriginalName();
                $path               = $icon1->move(public_path($this->profile_picture_upload_path), $iconName1);
                }else{
                    $iconName1      = $this->request->alt_pageKeyFeature1Icon;
                }
    
                $icon2              = $this->request->file('pageKeyFeature2Icon');
                 if (isset($icon2)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon2))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon2));
                } 
                $extension          = $icon2->getClientOriginalExtension();
                $iconName2          = $icon2->getClientOriginalName();
                $path               = $icon2->move(public_path($this->profile_picture_upload_path), $iconName2);
                }else{
                    $iconName2      = $this->request->alt_pageKeyFeature2Icon;
                }
    
                $icon3              = $this->request->file('pageKeyFeature3Icon');
                 if (isset($icon3)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon3))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon3));
                } 
                $extension          = $icon3->getClientOriginalExtension();
                $iconName3          = $icon3->getClientOriginalName();
                $path               = $icon3->move(public_path($this->profile_picture_upload_path), $iconName3);
                }else{
                    $iconName3      = $this->request->alt_pageKeyFeature3Icon;
                }
        
                $icon4              = $this->request->file('pageKeyFeature4Icon');
                 if (isset($icon4)) {
                    if(file_exists(public_path($this->profile_picture_upload_path.$icon4))) {
                    unlink(public_path($this->profile_picture_upload_path.$icon4));
                } 
                $extension          = $icon4->getClientOriginalExtension();
                $iconName4          = $icon4->getClientOriginalName();
                $path               = $icon4->move(public_path($this->profile_picture_upload_path), $iconName4);
                }else{
                    $iconName4      = $this->request->alt_pageKeyFeature4Icon;
                }



            $page = DetailPage::where('id',$id)->update([
                'page_name'         => $this->request->pageName,
                'title'             => $this->request->pageTitle,
                'subtitle'          => $this->request->pageSubtitle,
                'description'       => $this->request->inputDescription,
                'keyfeature1'       => $this->request->pageKeyFeature1,
                'kfIcon1'           => $iconName1,
                'keyfeature2'       => $this->request->pageKeyFeature2,
                'kfIcon2'           => $iconName2,
                'keyfeature3'       => $this->request->pageKeyFeature3,
                'kfIcon3'           => $iconName3,
                'keyfeature4'       => $this->request->pageKeyFeature4,
                'kfIcon4'           => $iconName4,
                'client_quote'      => $this->request->pageClientQuote?$this->request->pageClientQuote:'',
                'status'            => $this->request->pageStatus
            ]);

             return response()->json([
                'status'            => 'success',
                'message'           => 'Detail Page successfully updated'
                ]);
        }catch (\Exception $ex){
                return response()->json([
                'status'            => 'error',
                'code'              => $ex->getCode(),
                'message'           => $ex->getMessage()
            ]);
            }
    }

    /**
    * Function to soft delete Detail pages.
    * @param id
    * @return message, status
    * Created By: Parag
    */
    public function deleteDetailPage($id){
    $deleteQuestion = DetailPage::where('id', $id)->delete();
            return back()->withStatus(__('Detail Page successfully Deleted.'));
    }


    public function displayDetailPage(){
        
    }
}



















