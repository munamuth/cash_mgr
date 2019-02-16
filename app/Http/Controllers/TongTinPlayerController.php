<?php

namespace App\Http\Controllers;

use App\TongTinPlayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tongtin.player.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tongtin.player.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(TongTinPlayer $tongTinPlayer)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(TongTinPlayer $tongTinPlayer)
    {
       return view("tongtin.player.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TongTinPlayer $tongTinPlayer)
    {
        echo "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(TongTinPlayer $tongTinPlayer)
    {
        echo "destory";
    }
}
