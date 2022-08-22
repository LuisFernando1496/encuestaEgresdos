<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\User;
use Carbon\Carbon;
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
        $users = User::where('graduated',true)->where('active',1)->where('id','!=',1)->with('contactInformation')->paginate(5);
      //  return $users;
        return view('Graduados.index',compact('users'));
    }
   
    public function searchUsers(Request $request,$option)
    {
         $year = $request->year;
         
        if($request->periodoEscolar == "Enero-Junio")
        {
            $month = "01";
            $fecha = Carbon::parse( "$year-$month");
            $fechaIni  =  $fecha->format('Y-m-d');
            $fechaEnd = $fecha->addMonth(5)->format('Y-m-d');
        }
        if($request->periodoEscolar == "Agosto-Diciembre")
        {
            $month = "07";
            $fecha = Carbon::parse( "$year-$month");
            $fechaIni =  $fecha->format('Y-m-d');
            $fechaEnd = $fecha->addMonth(5)->format('Y-m-d');
        }
      
     $users = User::join('contact_information','contact_information.user_id','users.id')
                  ->where('users.graduated',$option)
                  ->where('users.active',1)
                  ->whereBetween('date_graduate',[$fechaIni,$fechaEnd])
                  ->where('users.id','!=',1)
                  ->with('contactInformation')
                  ->paginate(5);
        if($option == 1)
        {
            return view('Graduados.index',compact('users'));
        }
        else{
            return view('Alumnos.index',compact('users'));
        }
         
    }

   
    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user = User::where('id',$id)->with('contactInformation')->first();
        return view('users.edit',compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $contact = ContactInformation::where('user_id',$user->id)->first();
        $user->update($request->all());
        $contact->update($request->all());
        return redirect()->route('dashboard');
    }

   
    public function destroy($id)
    {
        $user = User::find($id);
        $user->update([
            'active'=>0
        ]);
        return redirect()->route('dashboard');
    }
}
