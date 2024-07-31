<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $pusher;
     public function __construct()
     {
         $this->pusher = new Pusher(
             env('PUSHER_APP_KEY'),
             env('PUSHER_APP_SECRET'),
             env('PUSHER_APP_ID'),
             [
                 'cluster' => env('PUSHER_APP_CLUSTER'),
                 'useTLS' => true,
             ]
         );
     }
    public function startCall()
    {
        $data = $request->all();
        $this->pusher->trigger('call-channel', 'start-call', $data);
        return response()->json(['status' => 'Call started']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function joinCall()
    {
        $data = $request->all();
        $this->pusher->trigger('call-channel', 'join-call', $data);
        return response()->json(['status' => 'Call joined']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function endCall(Request $request)
    {
        $data = $request->all();
        $this->pusher->trigger('call-channel', 'end-call', $data);
        return response()->json(['status' => 'Call ended']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
