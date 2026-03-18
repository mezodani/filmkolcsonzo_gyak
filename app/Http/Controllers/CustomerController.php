<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all(), 200, options: JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|min:1|max:50",
            "email" => "required|email|min:1|max:50",
            "phone" => "required|string|min:1|max:15",
            "city" => "required|string|min:1|max:50"
        ]);
        Customer::create($validated);
        return response()->json(["success" => true, "message" => "Customer created successfully!"], 201);
    }
}
