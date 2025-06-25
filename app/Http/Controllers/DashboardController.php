<?php

namespace App\Http\Controllers;
use App\Models\Artwork;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $artwork = Artwork::all() ;
       $artworks = Artwork::where('is_sold', 0)->get();
       $artworksold = Artwork::where('is_sold', 1)->get();
       $salesTotal = $artworksold->sum('price'); // مجموع مبيعات اللوحات المباعة
        return view('dashboard',compact('artwork','artworks','artworksold','salesTotal'));
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
