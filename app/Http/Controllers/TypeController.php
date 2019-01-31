<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::get();
        return view('cash.type.index', compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('cash.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->type_of = $request->type_of;
        if($type->save()){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index'));
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
    public function edit(Type $type)
    {
         return view('cash.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->name = $request->name;
        $type->type_of = $request->type_of;
        if($type->save()){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Type $type)
    {
        if( $type->delete() ){
            $request->session()->flash('status', 'Task was successful!');
        } else {
            $request->session()->flash('status', 'Task was not successful!');
        }
        return redirect(route('type.index'));
    }
}
