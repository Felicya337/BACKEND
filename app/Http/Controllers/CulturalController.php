<?php

namespace App\Http\Controllers;

use App\Models\Cultural;
use Illuminate\Http\Request;

class CulturalController extends Controller
{
    public function index()
    {
        return Cultural::with('ensiklopedi')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'origin' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        return Cultural::create($data);
    }

    public function show($id)
    {
        return Cultural::with('ensiklopedi')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cultural = Cultural::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'category' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'origin' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $cultural->update($data);

        return $cultural;
    }

    public function destroy($id)
    {
        $cultural = Cultural::findOrFail($id);
        $cultural->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
