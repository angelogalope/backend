<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Message::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $messages = Message::create($validated);

        return $messages;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Message::findorFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, string $id)
    {
        $validated = $request->validated();

        $messages = Message::findorFail($id);
        $messages->update($validated);

        return $messages;
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(string $id)
    {
        $messages = Message::findorFail($id);
 
        $messages->delete();

        return $messages;
    }
}
