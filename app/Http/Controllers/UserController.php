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
        $remember = false;
        if( isset($request->remember_me ))
            $remember = true;
        if (Auth::attempt(['email'=> $request->username, 'password'=> $request->password], $remember)) {
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
<<<<<<< HEAD
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        if($user->save()){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect()->route('users.index');
=======
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = $request->password;
        if($user->save()){
            $request->session()->flash('status', "Success");
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('status', "Success");
            return back();
        }
>>>>>>> d544728f4ebbb7472c31caca9a946568298d3bdf
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        if($user->save()){
            $request->session()->flash('status', "Success");
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('status', "Success");
            return back();
        }
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
    public function destroy(Request $request, User $user)
    {
        if($user->delete()){
            $request->session()->flash('status', "Success");
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('status', "Success");
            return back();
        }
    }
}
