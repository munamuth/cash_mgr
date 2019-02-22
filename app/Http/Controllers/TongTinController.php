<?php

namespace App\Http\Controllers;

use App\TongTin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinController extends Controller
{
    public function __construct(Request $request){
        app()->setlocale($request->local);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local)
    {
        return view('tongtin.tongtin.index', compact('local') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        return view('tongtin.tongtin.create', compact('local'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function show($local, TongTin $tongTin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function edit($local, TongTin $tongTin)
    {
        return view('tongtin.tongtin.edit', compact('local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $local, TongTin $tongTin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $local, TongTin $tongTin)
    {
        //
    }
}
