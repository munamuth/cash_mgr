<?php

namespace App\Http\Controllers;

use App\TongTinPlayerList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinPlayerListController extends Controller
{
    public function __construct(Request $request)
    {
        App()->setlocale($request->local);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local)
    {
        return view("tongtin.playerlist.index", compact('local') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        //
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
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function show($local, TongTinPlayerList $tongTinPlayerList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function edit($local, TongTinPlayerList $tongTinPlayerList)
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
    public function update(Request $request, $local, TongTinPlayerList $tongTinPlayerList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPlayerList  $tongTinPlayerList
     * @return \Illuminate\Http\Response
     */
    public function destroy($local, TongTinPlayerList $tongTinPlayerList)
    {
        //
    }
}
