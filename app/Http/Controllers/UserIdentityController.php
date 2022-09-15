<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserIdentityRequest;
use App\Http\Requests\UpdateUserIdentityRequest;
use App\Models\UserIdentity;

class UserIdentityController extends Controller
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
     * @param  \App\Http\Requests\StoreUserIdentityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserIdentityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserIdentity  $userIdentity
     * @return \Illuminate\Http\Response
     */
    public function show(UserIdentity $userIdentity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserIdentity  $userIdentity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserIdentity $userIdentity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserIdentityRequest  $request
     * @param  \App\Models\UserIdentity  $userIdentity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserIdentityRequest $request, UserIdentity $userIdentity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserIdentity  $userIdentity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserIdentity $userIdentity)
    {
        //
    }
}
