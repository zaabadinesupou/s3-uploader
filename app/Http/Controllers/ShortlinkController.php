<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortlinkRequest;
use App\Http\Requests\UpdateShortlinkRequest;
use App\Models\Shortlink;

class ShortlinkController extends Controller
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
     * @param  \App\Http\Requests\StoreShortlinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortlinkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shortlink  $shortlink
     * @return \Illuminate\Http\Response
     */
    public function show(Shortlink $shortlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shortlink  $shortlink
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortlink $shortlink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShortlinkRequest  $request
     * @param  \App\Models\Shortlink  $shortlink
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortlinkRequest $request, Shortlink $shortlink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shortlink  $shortlink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shortlink $shortlink)
    {
        //
    }
}
