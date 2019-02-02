<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use App\Type;
use Auth;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->role == 1 ){
            $expense = Expense::get();
        } else {
            $expense = Expense::where('u_id', Auth::id() )->get();
        }
        $month = date('m');
        $total = Expense::where('u_id', Auth::id() )->whereMonth('created_at', $month)->sum('amount');

        return view('cash.expense.index', compact('expense', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::where('type_of', "Expense")
                ->where("u_id", Auth::id())
                ->where("id", '>', 2)
                ->get();
        return view('cash.expense.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense();
        $expense->u_id = Auth::id();
        $expense->name = $request->name;
        $expense->type = $request->type;
        $expense->amount = $request->amount;
        if( $expense->save() )
        {
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('cash.expense.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $types = Type::where('type_of', "Expense")->get();
        return view('cash.expense.edit', compact('expense', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->u_id = Auth::id();
        $expense->name = $request->name;
        $expense->type = $request->type;
        $expense->amount = $request->amount;
        if( $expense->save() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expense $expense)
    {
        if( $expense->delete() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index');
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }
}
