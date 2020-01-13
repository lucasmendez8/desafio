<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::latest()->paginate(10);

        return view('servicios.index', compact('servicios'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required | min: 3 | unique:servicios,nombre'
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe un servicio con el nombre ingresado'
        ]);

        $servicio = new Servicio();
        $servicio->nombre = $request->get('nombre');
        $servicio->save();

        return redirect()->route('servicios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre' => 'required | min: 3 | unique:servicios,nombre,'.$servicio->id
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe un servicio con el nombre ingresado'
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Servicio $servicio
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
