<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Testas;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LecturerController extends Controller
{
    public function  __construct()
    {
        //$this->middleware(Testas::class);

    }

    public function index(Request $request){
        $lecturers=Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    public function create(){
        return view('lecturers.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|max:24',
            'surname'=>'required|max:24',
            'email'=>'required|email|unique:lecturers,email',
        ],[
            'name.required'=>  __('Name is required') ,
            'name.max'=>  __('Name must be no longer than 24 characters') ,
            'surname'=>__('Surname is required and must be no longer than 24 characters'),
            'email.unique'=>__('This email address is already registered.'),
            'email.required'=>__('Email is required') ,
            'email.email'=>__('Invalid email address') ,
        ]);



        $lecturer=new Lecturer();
        $lecturer->name=$request->name;
        $lecturer->surname=$request->surname;
        $lecturer->email=$request->email;
        $lecturer->birthdate=$request->birthdate;
        $lecturer->save();

        return redirect()->route('lecturer.index');
    }

    public function edit($id){
        $lecturer=Lecturer::find($id);
        return view('lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, $id){
        $lecturer=Lecturer::find($id);
        $lecturer->name=$request->name;
        $lecturer->surname=$request->surname;
        $lecturer->email=$request->email;
        $lecturer->birthdate=$request->birthdate;
        $lecturer->save();


        if ($request->hasFile('photo')){
            $request->file('photo')->store('/public');
            $lecturer->photo=$request->file('photo')->hashName();
            $lecturer->save();

        }

        return redirect()->route('lecturer.index');
    }

    public function destroy($id){
        Lecturer::destroy($id);
        return redirect()->route('lecturer.index');
    }

    public function deletePhoto($id){
        $lecturer=Lecturer::find($id);
        if ($lecturer->photo!=null){
            unlink( storage_path().'/app/public/'.$lecturer->photo );
            $lecturer->photo=null;
            $lecturer->save();
        }

        return redirect()->back();

    }


}
