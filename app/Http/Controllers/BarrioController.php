<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Ciudade;
use Illuminate\Http\Request;

class BarrioController extends Controller
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
        $barrios = Barrio::latest()->paginate(10);

        return view('barrios.index', compact('barrios'))
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
        return view('barrios.create', compact('ciudades'));
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
            'nombre' => 'required | min: 3 | unique:barrios,nombre'
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe un barrio con el nombre ingresado'
        ]);

        $barrio = new Barrio();
        $barrio->nombre = $request->get('nombre');
        $barrio->save();

        return redirect()->route('barrios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show(Barrio $barrio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrio $barrio)
    {
        $ciudades = Ciudade::all()->pluck('nombre', 'id');
        return view('barrios.edit', compact('barrio', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrio $barrio)
    {
        $request->validate([
            'nombre' => 'required | min: 3 | unique:barrios,nombre,'.$barrio->id,
            'ciudad_id' => 'required'
        ], [
            'required' => 'Este campo es obligatorio',
            'min' => 'Este campo debe contener al menos 3 caracteres',
            'unique' => 'Ya existe un barrio con el nombre ingresado'
        ]);

        $barrio->update($request->all());

        return redirect()->route('barrios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrio $barrio)
    {
        //
    }

    /**
     * Busca los barrios que existen en una para cargar el select dependiente
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCiudad(Request $request)
    {
        if (!$request->ciudad_id) {
            $html = '<option value="">Seleccione un barrio ...</option>';
        } else {
            $html = '<option value="">Seleccione un barrio ...</option>';
            $barrios = Barrio::where('ciudad_id', $request->ciudad_id)->get();
            foreach ($barrios as $barrio) {
                if ($request->old == 0) {
                    $html .= '<option value="'.$barrio->id.'">'.$barrio->nombre.'</option>';
                } else {
                    if ($barrio->id == $request->old) {
                        $html .= '<option value="'.$barrio->id.'" selected>'.$barrio->nombre.'</option>';
                    } else {
                        $html .= '<option value="'.$barrio->id.'">'.$barrio->nombre.'</option>';
                    }
                }
            }
        }

        return response()->json(['html' => $html]);
    }
}
