<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Stock;
use DB;

class DailystocksController extends Controller
{

    
//block guest from entering all page without login 
public function __construct()
{
    $this->middleware('auth');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Display at daily stock page start from the latest one to the old one (dashboard for job done)
         $stocks=Stock::orderby ('created_at','desc')->get();
         return view('stocks.index')->with ('stocks',$stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Go to create page
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Update stock list
        //cannot leave the box in empty space
        $this->validate($request, [
            'item' => 'required',
            'cost_kg' => 'required',
            'weight'  => 'required',
            'stock_process' => 'required'
            ]);
        
            //create post
        $stock = new Stock ;
        // $worker->attendance = $request->input('attendance');
         $stock->stock_process = $request->input('stock_process');
         $stock->item = $request->input('item');
         $stock->day = $request->input('day');
         $stock->month = $request->input('month');
         $stock->year = $request->input('year');
         $stock->cost_kg= $request->input('cost_kg');
         $stock->weight = $request->input('weight');
         $stock->remark = $request->input('remark');
         $stock->user_id = auth()->user()->id;
         
         
         if ($stock->weight>0){
         $stock->price=($stock->weight / 1000)*$stock->cost_kg;
         }
         else{
             $stock->price=0;
         }
     
         $stock->save();
 
 
         return redirect('/stocks')->with('success', 'Stock has been recorded');
     
     }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show all created job 
        $stock= Stock::find($id);
        return view('stocks.show')->with ('stock',$stock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock= Stock::find($id); 

        //check for correct user
        if(auth()->user()->id !==$stock->user_id){
            return redirect ('/stocks')->with('error', 'Unauthorized Page');
        }
        return view('stocks.edit')->with ('stock',$stock);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item' => 'required',
            'cost_kg' => 'required',
            'weight'  => 'required',
            'stock_process' => 'required'
            ]);

            $stock = Stock::find($id);
            $stock->stock_process = $request->input('stock_process');
            $stock->item = $request->input('item');
            $stock->day = $request->input('day');
            $stock->month = $request->input('month');
            $stock->year = $request->input('year');
            $stock->cost_kg= $request->input('cost_kg');
            $stock->weight = $request->input('weight');
            $stock->remark = $request->input('remark');
        
            
            $stock = Stock::find($id);
            if ($stock->weight>0){
            $stock->price=($stock->weight / 1000)*$stock->cost_kg;
            }
            else{
                $stock->price=0;
            }
        
            $stock->save();
    
    
            return redirect('/stocks')->with('success', 'Stock Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock= Stock::find($id);
         //check for correct user
         if(auth()->user()->id !==$stock->user_id){
            return redirect ('/stocks')->with('error', 'Unauthorized Page');
        }
    
        $stock->delete();
        return redirect('/stocks')->with('success', 'Stock Delete');
    }
    
}
