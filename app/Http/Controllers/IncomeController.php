<?php

namespace App\Http\Controllers;

use App\Income;
use App\Type;
use Illuminate\Http\Request;
use Auth;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $income = Income::where('u_id', Auth::id() )->get();
        $month = date('m');
        $total = Income::where('u_id', Auth::id() )->whereMonth('created_at', $month)->sum('amount');
        return view('cash.income.index', compact('income', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::where('type_of', "Income")
                    ->where("u_id", Auth::id())
                    ->where("id", '>', 2)
                    ->get();
        return view('cash.income.create', compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $income = new Income();
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        if( $income->save() )
        {
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('cash.income.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $types = Type::where('type_of', "Income")->get();
        return view('cash.income.edit', compact('income', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        if( $income->save() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Income $income)
    {
        if( $income->delete() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }
}
