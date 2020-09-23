<?php

namespace App\Http\Controllers;
use App\StaticPage;
use App\DetailPage;
use App\User;
use App\Comment;
use App\Round;
use Auth;
use DB;
use PDF;
use Charts;
use Dompdf\Dompdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application landing page.
     *
     * @return \Illuminate\View\View
     */
    public function testchart(){
        
        return view('pages.testchart');
        // echo "<pre>";
        // print_r($html); die("MKL");

        // $dompdf = new Dompdf();

        // $dompdf->loadHtml($html);
        // $dompdf->render();
        // return $dompdf->stream('feedback_report.pdf');

         // $pdf = PDF::loadHtml($html);
    }
    public function index()
    {
        $negotiations = StaticPage::where([
            ['name','Negotiation'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();

        $meet_maker = StaticPage::where([
            ['name','Meet Maker'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();
        $detail_pages = DetailPage::where('status','Active')->get();
        return view('layouts.page_templates.landing_page' ,compact('negotiations','meet_maker','detail_pages'));
    }


    public function policy()
    {
        $negotiations = StaticPage::where([
            ['name','Negotiation'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();

        $meet_maker = StaticPage::where([
            ['name','Meet Maker'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();
        $detail_pages = DetailPage::where('status','Active')->get();
        
        return view('pages.policy' ,compact('negotiations','meet_maker','detail_pages'));
    }

    public function terms()
    {
        $negotiations = StaticPage::where([
            ['name','Negotiation'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();

        $meet_maker = StaticPage::where([
            ['name','Meet Maker'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();
        $detail_pages = DetailPage::where('status','Active')->get();
        
        return view('pages.terms' ,compact('negotiations','meet_maker','detail_pages'));
    }



public function consulting() {

        $negotiations = StaticPage::where([
            ['name','Negotiation'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();

        $meet_maker = StaticPage::where([
            ['name','Meet Maker'],
            ['status','Active']
        ])->whereNotNull('status')
        ->first();
        $detail_pages = DetailPage::where('status','Active')->get();
    return view('pages.consulting' ,compact('negotiations','meet_maker','detail_pages'));
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if(Auth::user()->complete_profile == 1){
            // echo "<pre>";
            // print_r(Auth::user()); die;
            $id = Auth::user()->id; 
            $is_feedback_show = Auth::user()->is_feedback_show; 
            $rounds = Round::count();
            $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                        ->get();
            $user_count = $users->count();
            $comments =  Comment::where('submitted_for', $id)->select('liked_comment','disliked_comment')->get();
            return view('pages.dashboard',compact('user_count','rounds','id','is_feedback_show','comments'));
        }else{
            return redirect('/profile');
        }
            

    }



    public function userDashboard()
    {
        $rounds = Round::count();
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $user_count = $users->count();
        return view('pages.dashboard',compact('user_count','rounds'));

    }


    public function getDetailPage($slug){
            $slug_id = $slug;
            $DetailPages = DetailPage::all();
            $pageDetails = DetailPage::where('title',$slug)->first();

            // dd($slug_id);
            return view('layouts.page_templates.negotiation_1',compact('pageDetails','DetailPages','slug_id'));  

    }
}
