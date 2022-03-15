<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users= User::all();
        return view('home',compact('users'));
    }
    //-------------- Edit data---------------
    public function edit($id){
        $users = User ::findOrFail($id);
        return view('edit',compact('users'));
    }
    //-------------- Update data---------------
    function update(Request $request,$id){
        User ::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'birth_date'=>$request->birth_date,
            'country'=>$request->country,
            'city'=>$request->city,
        ]);
            return redirect()->to('/home')->with('update','Successfully Data Updated');

    }
      //-------------- Delete data---------------
      public function delete($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('delete','Successfully Data Deleted');
    }
}
