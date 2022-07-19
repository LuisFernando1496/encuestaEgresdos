<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $jobs = Jobs::where('status', true)->paginate(8);
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobsRequest  $request
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
            $base64 = defaultImgJobs();//$jobs->image;
        }

        $jobs = Jobs::create([
            'name_enterprise'=> $request->name_enterprise,
            'market_stall' => $request->market_stall,
            'description' => $request->description,
            'city_origin' => $request->city_origin,
            'workday' => $request->workday,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'image' => $base64
        ]);
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        return view('jobs.show',compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobs $jobs)
    {
        return view('jobs.edit', compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobsRequest  $request
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobs $jobs)
    {

        //$request['image']='hola';
        if ($request->image) {
            $imegnName = $request->image->getClientOriginalName();
            $imagen = $request->file('image');
            $type = pathinfo($imegnName, PATHINFO_EXTENSION);
            $img = file_get_contents($imagen);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        else{
            $base64 = $jobs->image;
        }

        $jobs->update([
            'name_enterprise'=> $request->name_enterprise,
            'market_stall' => $request->market_stall,
            'description' => $request->description,
            'city_origin' => $request->city_origin,
            'workday' => $request->workday,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'image' => $base64
        ]);
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobs $jobs)
    {
        $jobs->update([
            'status'=>false
        ]);
        return redirect()->route('jobs.index');
    }
}
