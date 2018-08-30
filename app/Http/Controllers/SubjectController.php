<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use App\Quiz;
use App\Subject_user;
use App\Subject;

use DB;
use Input;
use Config;
use Form;
use Html;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $username = Auth::user()->username;
        
         // $data = Quiz::all();

        $subjects = DB::table('Subjects')
       
        ->join('subjects_user','subjects_user.subject_id','=','Subjects.subject_id')
        ->join('users','users.username','=','subjects_user.username')
        ->where('users.username', '=', $username)
        ->get();


        


        return view('subject/index',compact('subjects'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('subject/addSubject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $username = Auth::user()->username;
    
        $subject = Subject::insert([
                    'subject_id' => $request->get('subject_id'),
                    'subject_name' => $request->get('subject_name')
                ]);
         
        $subject_user = Subject_user::insert([
                'subject_id' => $request->get('subject_id'),
                'username' => $username
        ]);

        // $subject->save();
        return redirect()->route('subject.index');
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
       
        $subject = DB::table('Subjects')->where('subject_id','=',$id)->first();


        // $data = Subject::findorfail($id);
        // dd($data->subject_id);
        return view('subject/editSubject', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->get('subject_id_old'); //id sent by editQuiz.blade.php
        
        $subject = Subject::find($id);
        $subject->subject_id = $request->get('subject_id');
        $subject->subject_name = $request->get('subject_name');
        $subject->save();


        $quiz = Quiz::where('subject_id','=',$id)
                ->update([
                    'subject_id' => $request->get('subject_id')
                ]);

        $subject_user = Subject_user::where('subject_id','=',$id)
                ->update([
                    'subject_id' => $request->get('subject_id')
                ]);
           
        return redirect()->route('subject.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Data Deleted');
    }
}
