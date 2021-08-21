<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\check;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table('student')->get();
        return view('home',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (true) {
            # code...
            $request->validate([
                'name'=>['required','min:3','alpha',new check],
                'password'=>['required'],
                'class'=>['required'],
                
            ]);
            $request->flashExcept('password');
            $request->except('_token');

            $name=$request->name;
            $password=$request->password;
            $class=$request->class;
            
            $m=DB::table('student')->insert([
                'name'=>$name,
                'password'=>$password,
                'class'=>$class
            ]);
            

            return redirect(route('fs'))->with('status','Values is comming');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $data=DB::table('student')->where('id',$id)->first();
        // dd($data);
        
        
        return view('update',['data'=>$data]);
    }
    public function successfullupdate(Request $request,$id)
    {
        $request->validate([
            'name'=>['required','min:3','alpha'],
            'password'=>['required'],
            'class'=>['required'],
            
        ]);
        $name=$request->name;
        $password=$request->password;
        $class=$request->class;
        
        $content=DB::table('student')->where('id',$id)->update(
            [
                'name'=>$name,
                'password'=>$password,
                'class'=>$class,
            ]
            );
            return redirect(route('fs'))->with('status','Values is comming');
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
        DB::table('student')->delete($id);
        return redirect(route('x'));
    }
}
