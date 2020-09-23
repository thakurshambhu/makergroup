<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        
        return view('users.index', ['users' => $model->where('complete_profile','1')->orderBy('role_id')->get()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password') ? 1 : 0;
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }


    public function addAdmin(){
        return view('pages.add_admin');
    }
    public function masterpassword(){
        $password = DB::table('master_password')->get();
        //print_r(base64_decode($password[0]->password)); exit;
        return view('pages.master_password',compact('password'));
    }

    public function saveAdmin(UserRequest $request, User $model){
        // echo "jkcfhskdf";
        // dd($request->all());
    $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

            return redirect()->route('user.index')->withStatus(__('Admin successfully created.'));    
        }

        public function saveMpassword(Request $request){
        $password = DB::table('master_password')->get();
            $mpassword = $request->mpassword;
            // print_r($password); exit;
        if(isset($password[0]->password) & !empty($password[0]->password))
        {
            $save = DB::table('master_password')->where('id',1)->update([ 'password' => base64_encode($mpassword)]);
        }
        else
        {

            $save = DB::table('master_password')->insert([ 'password' => base64_encode($mpassword) ]);
        }
            if($save)
            {
                return redirect()->route('masterpassword')->withStatus(__('Master Password saved successfully.'));
            }
        }

}
