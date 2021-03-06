<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use App\Type;
use Auth;
use Carbon\Carbon;
class ExpenseController extends Controller
{


    public function __construct(Request $request){
        app()->setlocale($request->local);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($local)
    {
        
        $expense = Expense::where('u_id', Auth::id() )->orderBy("created_at")->get();       
        $month = date('m');
        $total = Expense::where('u_id', Auth::id() )->whereMonth('created_at', $month)->sum('amount');

        return view('cash.expense.index', compact('expense', 'total', 'local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {
        $types = Type::where('type_of', "Expense")
                ->where("u_id", Auth::id())
                ->where("id", '>', 2)
                ->get();
        return view('cash.expense.create', compact('types', 'local'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $local)
    {
        $create = Carbon::createFromFormat('d/m/Y',$request->create); 

        $expense = new Expense();
        $expense->u_id = Auth::id();
        $expense->name = $request->name;
        $expense->type = $request->type;
        $expense->amount = $request->amount;
        $expense->created_at = $create->format('Y-m-d');
        if( $expense->save() )
        {
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index', $local);
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
    public function show($local, Expense $expense)
    {
        return view('cash.expense.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($local, Expense $expense)
    {
        $types = Type::where('type_of', "Expense")->get();
        return view('cash.expense.edit', compact('expense', 'types', 'local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$local, Expense $expense)
    {
        $create = Carbon::createFromFormat('d/m/Y',$request->create); 

        $expense->u_id = Auth::id();
        $expense->name = $request->name;
        $expense->type = $request->type;
        $expense->amount = $request->amount;
        $expense->created_at = $create->format('Y-m-d');
        if( $expense->save() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index', $local);
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
    public function destroy(Request $request, $local, Expense $expense)
    {
        if( $expense->delete() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('expense.index', $local);
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }
}
