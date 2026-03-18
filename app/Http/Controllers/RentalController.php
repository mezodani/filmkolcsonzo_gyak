<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with("film", "customer")->get();
        return response()->json($rentals, 200, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "film_id" => "required|exists:films,id",
            "customer_id" => "required|exists:customers,id",
            "due_date" => "required|date|after:tomorrow"
        ]);

        $film_id = $request->film_id;
        $film = Film::find($film_id);
        $film->available = 0;
        $film->save();

        Rental::create([
            "film_id" => $request->film_id,
            "customer_id" => $request->customer_id,
            "rental_date" => now()->toDateString(),
            "due_date" => $request->due_date
        ]);

        return response()->json(["success" => true, "message" => "Rental created successfully!"],201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
