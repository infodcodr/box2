<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $message = New Message();

            $message = $message->with('user','touser')->where('from',auth()->user()->id)->orWhere('to',auth()->user()->id)->distinct()->get();
            $data['data'] = $message;
            $data['message'] = 'create';
            return  $this->apiResponse($data,200);
        }catch(\Exception $e)
        {
            $data['message'] = 'error';
            return  $this->apiResponse($data,404);
        }
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
        try{
            $data = $request->all();
            $message = New Message();
            $message->from = auth()->user()->id;
            $message->to = $data['id'];
            $message->content = $data['content'];
            $message->type = 'message';
            $message->chattype = $data['chattype'];
            if($request->type){
                $message->content = $data['type'];
            }
            $message->save();
            $data['data'] = $message;
            $data['message'] = 'create';
            return  $this->apiResponse($data,200);
        }catch(\Exception $e)
        {
            $data['message'] = $e->getMessage()." " .$e->getLine()." ".$e->getFile();
            return  $this->apiResponse($data,404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
         try{
            $message = New Message();

            $message = $message->with('user','touser')->where('from',$id)->orWhere('to',$id)->distinct()->get();
            $data['data'] = $message;
            $data['message'] = 'create';
            return  $this->apiResponse($data,200);
        }catch(\Exception $e)
        {
            $data['message'] = $e->getMessage()." " .$e->getLine()." ".$e->getFile();
            return  $this->apiResponse($data,404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
