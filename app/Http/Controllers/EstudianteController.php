<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;


class EstudianteController extends Controller
{
    const SEXO =  [
        'masculino',
        'femenino',
        'otro'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudiante::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['sexo_array'] = self::SEXO;

        try {
            validator($request->all(), [
                "nombre" => ["required", "string", "min:5", "max:59"],
                "email" => ["required", "email"],
                "telefono" => ["required"],
                "sexo" => ["required", "in_array:sexo_array.*"],
                "direccion" => ["nullable"],
                "dni_nif" => ["nullable"]
            ])->validate();
        }
        catch (ValidationException $e) {
            return response($e->errors(), 404);
        }

        $estudiante = Estudiante::create([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'sexo' => $request['sexo'],
            'direccion' => $request['direccion'],
            'dni_niff' => $request['dni_nif']
        ]);

        return response($estudiante);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        if (is_null($estudiante)) {
            return response('El estudiante indicado no existe.', 404);
        }

        return response($estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request['sexo_array'] = self::SEXO;

        $estudiante = Estudiante::find($request['id']);

        if (is_null($estudiante)) {
            return response('El estudiante indicado no existe.', 404);
        }

        try {
            validator($request->all(), [
                "nombre" => ["required", "string", "min:5", "max:59"],
                "email" => ["required", "email"],
                "telefono" => ["required"],
                "sexo" => ["required", "in_array:sexo_array.*"],
                "direccion" => ["nullable"],
                "dni_nif" => ["nullable"]
            ])->validate();
        }
        catch (ValidationException $e) {
            return response($e->errors(), 404);
        }

        $estudiante->nombre = $request['nombre'];
        $estudiante->email = $request['email'];
        $estudiante->telefono = $request['telefono'];
        $estudiante->sexo = $request['sexo'];
        $estudiante->direccion = $request['direccion'];
        $estudiante->dni_nif = $request['dni_nif'];

        $estudiante->save();

        return response($estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);

        if (is_null($estudiante)) {
            return response('El estudiante indicado no existe.', 404);
        }

        $estudiante->delete();

        return response('El estudiante ha sido eliminado correctamente');
    }
}
