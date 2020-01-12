<?php

namespace App\Http\Controllers;

use App\Barrio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
