<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudents()
    {
        $users = User::where('graduated',false)->where('active',1)->where('id','!=',1)->with('contactInformation')->paginate(5);
      //  return $users;
        return view('Alumnos.index',compact('users'));
    }
    public function indexGraduates()
    {
        $users = User::where('graduated',true)->where('active',1)->with('contactInformation')->paginate(5);
      //  return $users;
        return view('Graduados.index',compact('users'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::where('id',$id)->with('contactInformation')->first();
        return view('users.edit',compact('user'));
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
        $user = User::find($id);
        $contact = ContactInformation::where('user_id',$user->id)->first();
        $user->update($request->all());
        $contact->update($request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->update([
            'active'=>0
        ]);
        return redirect()->route('dashboard');
    }
}
