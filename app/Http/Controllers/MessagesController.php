<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessagesRequest;
use App\Http\Requests\UpdateMessagesRequest;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('messages.index');
        $userMesageId = Auth::user()->id;
         $visto = Messages::where('to_id',$userMesageId)->where('status',false)->get();
         foreach($visto as $item)
         {
            $item->update([
                'status'=>true
            ]);
         }
         return view('chat.index');
    }

    public function admindChat()
    {
        return view('messages.index');
    }
    public function redirect($id, $name)
    {
       
            session(['idUser' => $id]);
           session(['nameUser' => $name]);
           $userMesageId = Auth::user()->id;
         $visto = Messages::where('to_id',$userMesageId)->where('status',false)->get();
         foreach($visto as $item)
         {
            $item->update([
                'status'=>true
            ]);
         }
        return redirect()->route('messages.index');
    }
     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessagesRequest  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessagesRequest $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
