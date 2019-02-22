<?php

namespace App\Http\Controllers;

use App\TongTinPlayerList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinPlayerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tongtin.playerlist.index");
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
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function show(TongTinPlayerList $tongTinPlayerList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function edit(TongTinPlayerList $tongTinPlayerList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TongTinPlayerList $tongTinPlayerList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TongTinPlayerList $tongTinPlayerList)
    {
        //
    }
}
