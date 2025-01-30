<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterGlossary;
use App\Http\Resources\AdminMasterGlossaryListResource;

class MasterGlossaryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index( MasterGlossary $masterGlossary , Request $request )
    {
        $masterGlossary = $masterGlossary->withCount('glossaryItems')->get();
        return  AdminMasterGlossaryListResource::collection($masterGlossary);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterGlossary $particular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterGlossary $particular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterGlossary $particular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterGlossary $particular)
    {
        //
    }
}
