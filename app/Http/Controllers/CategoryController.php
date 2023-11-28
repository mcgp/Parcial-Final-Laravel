<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'costo_promedio' => 'required|numeric',
            'edad_minima' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::with('exhibiciones')->find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
    
        return response()->json($category);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'costo_promedio' => 'required|numeric',
            'edad_minima' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $category->update($request->all());
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Categoría eliminada'], 200);
    }
}
        //
        
    

        //
       