<?php

namespace App\Http\Controllers;

use App\Ciudade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CiudadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ciudades = Ciudade::latest()->paginate(10);

        return view('ciudades.index', compact('ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ciudades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required | min: 3 | unique:ciudades,nombre'
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe una ciudad con el nombre ingresado'
        ]);

        $ciudad = new Ciudade();
        $ciudad->nombre = $request->get('nombre');
        $ciudad->save();

        return redirect()->route('ciudades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudade  $ciudad
     * @return Response
     */
    public function show(Ciudade $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $ciudad = Ciudade::findOrFail($id);
        return view('ciudades.edit', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $ciudad = Ciudade::findOrFail($id);
        $request->validate([
            'nombre' => 'required | min: 3 | unique:ciudades,nombre,'.$ciudad->id
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe una ciudad con el nombre ingresado'
        ]);

        $ciudad->update($request->all());

        return redirect()->route('ciudades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudade  $ciudad
     * @return Response
     */
    public function destroy(Ciudade $ciudad)
    {
        //
    }
}
