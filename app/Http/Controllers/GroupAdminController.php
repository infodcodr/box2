<?php

namespace App\Http\Controllers;

use App\GroupAdmin;
use Illuminate\Http\Request;

class GroupAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $GroupAdmin = New GroupAdmin();
            $GroupAdmin->user_id = auth()->user()->id;
            $GroupAdmin->group_id = $request->id;
            $GroupAdmin->save();
            return $this->apiResponse($GroupAdmin,200);
        }catch(\Exception $e)
        {
            return $this->apiResponse('issue',400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupAdmin  $groupAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupAdmin $groupAdmin)
    {
        //
    }
}
