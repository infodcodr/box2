<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($day)
    {
        try{
            $post = Note::all();
            return $this->apiResponse($post,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
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
            $post = Note::create($request->all());
            return $this->apiResponse($post,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = Note::find($id);
            return $this->apiResponse($post,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
            $post = Note::find($id);
            $post->update($request->all());
            return $this->apiResponse($post,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $post = Note::find($id);
            $post->delete();
            return $this->apiResponse($post,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
        }
    }

}
