<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Worker;
use DB;


class WorkersController extends Controller
{                       
    
    //block guest from entering the page without login except index & show
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
        //Display at job list page start from the latest one to the old one (dashboard for job done)
        $workers=Worker::orderby ('created_at','desc')->get();
        return view('workers.index')->with ('workers',$workers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Go to create page
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store to database

        $this->validate($request, [
            'name' => 'required',
            'weight'  => 'required'
            ]);
    
            /*//Handle File Upload
            if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
         
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
        
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);
            } 
            
            else {
                $fileNameToStore = 'noimage.jpg';
            }*/

        //create post
        $worker = new Worker ;
       // $worker->attendance = $request->input('attendance');
        $worker->name = $request->input('name');
        $worker->day = $request->input('day');
        $worker->month = $request->input('month');
        $worker->year = $request->input('year');
        $worker->method = $request->input('method');
        $worker->user_id = auth()->user()->id;
        $worker->weight = $request->input('weight');
        $worker->remark= $request->input('remark');
        
        if ($worker->weight>0){
        $worker->salary=($worker->weight / 1000)*$worker->method;
        }
        else{
            $worker->salary=0;
        }
    
        $worker->save();


        return redirect('/workers')->with('success', 'Job Created');
    
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
        $worker= Worker::find($id);
        return view('workers.show')->with ('worker',$worker);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker= Worker::find($id); 

        //check for correct user
        if(auth()->user()->id !==$worker->user_id){
            return redirect ('/workers')->with('error', 'Unauthorized Page');
        }
        return view('workers.edit')->with ('worker',$worker);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
