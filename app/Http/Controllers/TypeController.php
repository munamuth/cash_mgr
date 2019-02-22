<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Auth;
class TypeController extends Controller
{

    public function __construct(Request $request){
        app()->setlocale($request->local);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $local)
    {
        $types = Type::where("id", ">", 2)->where('u_id', Auth::id())->get();
        return view('cash.type.index', compact("types", 'local'));
    }

    public function getAll($local){
        if( Auth::user()->role == 1 && Auth::id() == 1 ){
            $types = Type::where("id", ">", 2)->get();
        } else if (Auth::user()->role == 1 && Auth::id() != 1 ) {
             $types = Type::get();
        }
        return view('cash.type.index', compact("types", 'local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        
        return view('cash.type.create', compact('local') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->u_id = Auth::id();
        $type->type_of = $request->type_of;
        if($type->save()){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index', $local));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
         return view('cash.type.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($local, Type $type)
    {
         return view('cash.type.edit', compact('type', 'local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $local, Type $type)
    {
        $type->name = $request->name;
        $type->type_of = $request->type_of;
        if($type->save()){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index', $local));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $local,  Type $type)
    {
        if( $type->delete() ){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index', $local));
    }
}
