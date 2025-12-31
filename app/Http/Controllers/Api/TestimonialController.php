<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Public: Get all testimonials
    public function index()
    {
        // Eager load user to show name/avatar
        return Testimonial::with('user:id,name,avatar')->latest()->get();
    }

    // Protected: Create
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimonial = Auth::user()->testimonials()->create($request->all());

        return response()->json($testimonial, 201);
    }

    // Protected: Delete (Only own)
    public function destroy($id)
    {
        $testimonial = Auth::user()->testimonials()->findOrFail($id);
        $testimonial->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}