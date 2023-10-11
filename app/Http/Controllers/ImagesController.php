<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateImagesRequest;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::where('status', true)->orderBY('id','DESC')->paginate(8);
        return view('image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImagesRequest  $request
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

        $jobs = Images::create([
           
            'image' => $base64
        ]);
        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        return view('image.edit',compact('images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImagesRequest  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        if ($request->image) {
            $imegnName = $request->image->getClientOriginalName();
            $imagen = $request->file('image');
            $type = pathinfo($imegnName, PATHINFO_EXTENSION);
            $img = file_get_contents($imagen);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        else{
            $base64 = $images->image;
        }

        $images->update([
            'image' => $base64
        ]);
        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        $images->update([
            'status'=>false
        ]);
        return redirect()->route('images.index');
    }
}
