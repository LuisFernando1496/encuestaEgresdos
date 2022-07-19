<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('status',true)->orderBy('id','Desc')->paginate(8);
        return view('eventos.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
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

        $jobs = Activity::create([
            'name_event'=> $request->name_event,
            'fecha_event' => $request->fecha_event,
            'description' => $request->description,
            'place' => $request->place,
            'image' => $base64
        ]);
        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('eventos.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
       
        return view('eventos.edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivityRequest  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        if ($request->image) {
            $imegnName = $request->image->getClientOriginalName();
            $imagen = $request->file('image');
            $type = pathinfo($imegnName, PATHINFO_EXTENSION);
            $img = file_get_contents($imagen);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        else{
            $base64 = $activity->image;
        }

        $activity->update([
            'name_event'=> $request->name_event,
            'fecha_event' => $request->fecha_event,
            'description' => $request->description,
            'place' => $request->place,
            'image' => $base64
        ]);
        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->update([
            'status'=>false
        ]);
        return redirect()->route('activity.index');
    }
}
