<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{

    public function login()
    {
        return view('user.login');
    }

    public function doLogin(Request $request)
    {


        if (Auth::attempt(['email'=> $request->username, 'password'=> $request->password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            $request->session()->flash('status', "Invalid Username or Password!!!");
            return back();
        }
    }
    public function register()
    {
        return view('user.register');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if( Auth::user()->role == 1 ){
            $users = $user::get();
        } else {
            $users = $user::where('id', Auth::id() )->get();
        }
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function show(Usr $usr)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function edit(Usr $usr)
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usr $usr)
    {
        //
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.change_password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        if($user->save()){
            $request->session()->flash('status', "Success");
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('status', "Success");
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usr $usr)
    {
        //
    }
}
