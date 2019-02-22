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
    public function index(TongTinPlayer $tongTinPlayer)
    {
        $players = $tongTinPlayer->get();
        return view('tongtin.player.index', compact('players'));
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
    public function store(Request $request, TongTinPlayer $tongTinPlayer)
    {
        $tongTinPlayer->name = $request->name;
        $tongTinPlayer->phone = $request->phone;
        $tongTinPlayer->address = $request->address;
        if( $tongTinPlayer->save() ){
            $request->session()->flash("status", "Your task was successfully");
        } else {
            $request->session()->flash("status", "Your task was not successfully");
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, TongTinPlayer $tongTinPlayer)
    {
        $player = $tongTinPlayer->find($id);
        return Response()->json([
            'DATA' => $player,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(TongTinPlayer $player)
    {
       return view("tongtin.player.edit", compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TongTinPlayer $tongTinPlayer, $id)
    {
        $player = $tongTinPlayer->find($id);
        $player->name = $request->name;
        $player->phone = $request->phone;
        $player->address = $request->address;
        if( $player->save() ){
            $request->session()->flash("status", "Your task was successfully");
        } else {
            $request->session()->flash("status", "Your task was not successfully");
        }
        return redirect(route('player.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TongTinPlayer $tongTinPlayer, $id)
    {
        $player = $tongTinPlayer->find($id);
        if( $player->delete() ){
            $request->session()->flash("status", "Your task was successfully");
        } else {
            $request->session()->flash("status", "Your task was not successfully");
        }
        return redirect(route('player.index'));
    }
}
