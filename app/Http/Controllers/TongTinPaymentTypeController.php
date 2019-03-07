<?php

namespace App\Http\Controllers;

use App\TongTinPaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TongTinPaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local)
    {
        return view('tongtin.type.index', compact('local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        return view('tongtin.type.create', compact('local'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local)
    {   $type = new TongTinPaymentType();
        $type->name = $request->name;
        $type->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TongTinPaymentType  $tongTinPaymentType
     * @return \Illuminate\Http\Response
     */
    public function show(TongTinPaymentType $tongTinPaymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TongTinPaymentType  $tongTinPaymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(TongTinPaymentType $tongTinPaymentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TongTinPaymentType  $tongTinPaymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TongTinPaymentType $tongTinPaymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TongTinPaymentType  $tongTinPaymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TongTinPaymentType $tongTinPaymentType)
    {
        //
    }
}
