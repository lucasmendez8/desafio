<?php

namespace App\Http\Controllers;

use App\Ciudade;
use App\Cliente;
use App\Servicio;
use App\Barrio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);

        return view('clientes.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudade::all()->pluck('nombre', 'id');
        $servicios = Servicio::all()->pluck('nombre', 'id');
        return view('clientes.create', compact('ciudades', 'servicios'));
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
            'apellidos' => 'required | min: 3',
            'nombres' => 'required | min: 3',
            'cuit' => 'required | numeric | digits: 11 | unique:clientes',
            'direccion' => 'required',
            'ciudad_id' => 'required',
            'barrio_id' => 'required',
            'servicio_id' => 'required'
        ], [
            'required' => 'Este campo es obligatorio',
            'cuit.digits' => 'Este campo debe contener solamente valores numéricos. Ej: 20123456781',
            'cuit.unique' => 'Ya existe un usuario con el cuit ingresado',
            'apellidos.min' => 'Este campo debe tener al menos 3 caracteres',
            'nombres.min' => 'Este campo debe tener al menos 3 caracteres'
        ]);

        $cliente = new Cliente();
        $cliente->nombres = $request->get('nombres');
        $cliente->apellidos = $request->get('apellidos');
        $cliente->cuit = $request->get('cuit');
        $cliente->direccion = $request->get('direccion');
        $cliente->ciudad_id = $request->get('ciudad_id');
        $cliente->barrio_id = $request->get('barrio_id');
        $cliente->servicio_id = $request->get('servicio_id');
        $cliente->estado_servicio = $request->get('estado_servicio');
        $cliente->save();

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $ciudades = Ciudade::all()->pluck('nombre', 'id');
        $barrios = Barrio::where('ciudad_id', $cliente->ciudad_id)->pluck('nombre', 'id');
        $servicios = Servicio::all()->pluck('nombre', 'id');
        return view('clientes.edit', compact('cliente', 'ciudades', 'barrios', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'apellidos' => 'required | min: 3',
            'nombres' => 'required | min: 3',
            'cuit' => 'required | numeric | digits: 11 | unique:clientes,cuit,' . $cliente->id,
            'direccion' => 'required',
            'ciudad_id' => 'required',
            'barrio_id' => 'required',
            'servicio_id' => 'required'
        ], [
            'required' => 'Este campo es obligatorio',
            'cuit.digits' => 'Este campo debe contener solamente valores numéricos. Ej: 20123456781',
            'cuit.unique' => 'Ya existe un usuario con el cuit ingresado',
            'apellidos.min' => 'Este campo debe tener al menos 3 caracteres',
            'nombres.min' => 'Este campo debe tener al menos 3 caracteres'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success','El cliente se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
