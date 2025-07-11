<?php

namespace App\Http\Controllers;
use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artwork = Artwork::all() ;
        return view('welcome' , compact( 'artwork' )) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Category = Category::all() ;
        $artwork = Artwork::all() ;
        return view('okar_componatnts.Portfolio',compact('Category','artwork')) ;
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
    public function show($id)
    {
        $artwork = Artwork::findOrFail($id);
        return view('okar_componatnts.imgditaels',compact('artwork')) ;
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
