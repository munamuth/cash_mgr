<?php

namespace App\Http\Controllers;

use App\TongTin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "ok";
        //return view('tongtin.tongtin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function show(TongTin $tongTin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function edit(TongTin $tongTin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TongTin $tongTin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTin  $tongTin
     * @return \Illuminate\Http\Response
     */
    public function destroy(TongTin $tongTin)
    {
        //
    }
}
