<?php

namespace App\Http\Controllers;

use App\Income;
use App\Type;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\IncomeRequest;
class IncomeController extends Controller
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
        
        $income = Income::where('u_id', Auth::id() )->orderBy('created_at')->get();
        $month = date('m');
        $total = Income::where('u_id', Auth::id() )->whereMonth('created_at', $month)->sum('amount');
        return view('cash.income.index', compact('income', 'total', 'local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($local)
    {   
        $types = Type::where('type_of', "Income")
                    ->where("u_id", Auth::id())
                    ->where("id", '>', 2)
                    ->get();
        return view('cash.income.create', compact("types", "local"));
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

        $income = new Income();
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        $income->created_at = $create->format('Y-m-d');
        if( $income->save() )
        {
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index', $local);
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
    public function edit($local, Income $income)
    {
        $types = Type::where('type_of', "Income")->get();
        return view('cash.income.edit', compact('income', 'types', 'local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeRequest $request, $local, Income $income)
    {
        $create = Carbon::createFromFormat('d/m/Y',$request->create);
        $income->u_id = Auth::id();
        $income->name = $request->name;
        $income->type = $request->type;
        $income->amount = $request->amount;
        $income->created_at = $create->format('Y-m-d');
        if( $income->save() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index', $local);
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
    public function destroy(Request $request, $local, Income $income)
    {
        if( $income->delete() ){
            $request->session()->flash('status', 'Task was successfully!!!');
            return redirect()->route('income.index', $local);
        } else {
            $request->session()->flash('status', 'Task was not successfully!!!');
            return back();
        }
    }
}
