<?php

namespace App\Http\Controllers;

use App\Income;
use App\Type;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        if( Auth::user()->role == 1 ){
            $income = Income::get();
        } else {
            $income = Income::where('u_id', Auth::id() )->get();
        }
=======
>>>>>>> d544728f4ebbb7472c31caca9a946568298d3bdf
        
        $income = Income::where('u_id', Auth::id() )->orderBy('created_at')->get();
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
<<<<<<< HEAD
                    ->where('u_id', Auth::id() )->get();
=======
                    ->where("u_id", Auth::id())
                    ->where("id", '>', 2)
                    ->get();
>>>>>>> d544728f4ebbb7472c31caca9a946568298d3bdf
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
        
        $create = Carbon::createFromFormat('d/m/Y',$request->create);

        $income = new Income();
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        $income->created_at = $create->format('Y-m-d');
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
        $create = Carbon::createFromFormat('d/m/Y',$request->create);
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        $income->created_at = $create->format('Y-m-d');
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
