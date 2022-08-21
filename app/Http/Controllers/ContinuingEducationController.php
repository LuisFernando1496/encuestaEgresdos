<?php

namespace App\Http\Controllers;

use App\Models\ContinuingEducation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContinuingEducationController extends Controller
{
   
    public function index()
    {
        $educations = ContinuingEducation::where('status', true)->orderBY('id','DESC')->paginate(2);
        return view('continuingEducation.index', compact('educations'));
    }

    public function create()
    {
        return view ('continuingEducation.create');
    }

    
    public function store(Request $request)
    {
        if ($request->image) {
            $imegnName = $request->image->getClientOriginalName();
            $imagen = $request->file('image');
            $type = pathinfo($imegnName, PATHINFO_EXTENSION);
            $img = file_get_contents($imagen);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        else{
            $base64 = defaultImgEvents();//$jobs->image;
        }

        $education = ContinuingEducation::create([
            'name_courses'=> $request->name_courses,
            'fecha_courses' => $request->fecha_courses,
            'description' => $request->description,
            'cel_phone' => $request->cel_phone,
            'place' => $request->place,
            'image' => $base64
        ]);
        return redirect()->route('education.index');
    }

 
    public function show(ContinuingEducation $continuingEducation)
    {
        return view ('continuingEducation.show',compact('continuingEducation'));
    }

    public function edit(ContinuingEducation $continuingEducation)
    {
        return view ('continuingEducation.edit',compact('continuingEducation'));
    }

    public function update(Request $request, ContinuingEducation $continuingEducation)
    {
        if ($request->image) {
            $imegnName = $request->image->getClientOriginalName();
            $imagen = $request->file('image');
            $type = pathinfo($imegnName, PATHINFO_EXTENSION);
            $img = file_get_contents($imagen);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        else{
            $base64 = $continuingEducation->image;
        }

        $continuingEducation->update([
            'name_courses'=> $request->name_courses,
            'fecha_courses' => $request->fecha_courses,
            'description' => $request->description,
            'cel_phone' => $request->cel_phone,
            'place' => $request->place,
            'image' => $base64
        ]);
        return redirect()->route('education.index');
    }

    public function destroy(ContinuingEducation $continuingEducation)
    {
        $continuingEducation->update([
            'status'=>false
        ]);
        return redirect()->route('education.index');
    }
}
