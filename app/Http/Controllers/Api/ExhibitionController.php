<?php

namespace App\Http\Controllers\Api;

use App\Models\Exhibition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
     }
    public function index()
    {
        //
        $exhibiciones = Exhibition::all();
        return response()->json($exhibiciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'ubicacion' => 'required|string|max:50',
            'presentador' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'capacidad_maxima' => 'required|integer',
            'fecha_exhibicion' => 'required|date',
            'tipo_exhibicion' => 'required|string|max:50',
            'costo_entrada' => 'required|numeric',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $exhibicion = Exhibition::create($request->all());
        return response()->json($exhibicion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exhibicion = Exhibition::with('category')->find($id);
    
        if (is_null($exhibicion)) {
            return response()->json(['error' => 'Exhibición no encontrada'], 404);
        }
    
        return response()->json($exhibicion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $exhibicion = Exhibition::findOrFail($id);
        if (is_null($exhibicion)) {
            return response()->json(['error' => 'Exhibición no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'ubicacion' => 'required|string|max:50',
            'presentador' => 'required|string|max:100',
            'especie' => 'required|string|max:50',
            'capacidad_maxima' => 'required|integer',
            'fecha_exhibicion' => 'required|date',
            'tipo_exhibicion' => 'required|string|max:50',
            'costo_entrada' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $exhibicion->update($request->all());
        return response()->json($exhibicion, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $exhibicion = Exhibition::findOrFail($id);
        if (is_null($exhibicion)) {
            return response()->json(['error' => 'Exhibición no encontrada'], 404);
        }
        $exhibicion->delete();
        return response()->json(['message' => 'Exhibición eliminada correctamente'], 200);

    }
}
