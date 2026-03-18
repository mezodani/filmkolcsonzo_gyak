<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return response()->json(Film::all(), 200, options: JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|min:1|max:50",
            "director" => "required|string|min:1|max:50",
            "release_year" => "required|integer|min:1900|max:2026",
            "genre" => "required|string|min:1|max:50"
        ]);
        Film::create($validated);
        return response()->json(["success" => true, "message" => "Film created successfully!"], 201);
    }
}
