<?php

namespace App\Http\Controllers;

use App\TongTinPlayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinPlayerController extends Controller
{

    public function __construct(Request $request)
    {
        app()->setlocale($request->local);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local, TongTinPlayer $tongTinPlayer)
    {
        $players = $tongTinPlayer->get();
        return view('tongtin.player.index', compact('players', 'local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        return view("tongtin.player.create", compact('local') );
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
    public function edit($local, TongTinPlayer $player)
    {
       return view("tongtin.player.edit", compact('player', 'local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $local, $id)
    {
        $player = new TongTinPlayer();
        $player = $player->find($id);
        $player->name = $request->name;
        $player->phone = $request->phone;
        $player->address = $request->address;
        if( $player->save() ){
            $request->session()->flash("status", "Your task was successfully");
        } else {
            $request->session()->flash("status", "Your task was not successfully");
        }
        return redirect(route('player.index', $local));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPlayer  $tongTinPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $local, TongTinPlayer $player)
    {
        if( $player->delete() ){
            $request->session()->flash("status", "Your task was successfully");
        } else {
            $request->session()->flash("status", "Your task was not successfully");
        }
        return redirect(route('player.index', $local));
    }
}
