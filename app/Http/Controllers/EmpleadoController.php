<?php

namespace App\Http\Controllers;
use App\Models\Empleado;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleados/crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:3', 'max:50'],
            'sueldo' => ['required', 'numeric'],
            'telefono' => ['required', 'integer','digits_between:8,10'],
            'puesto' => ['required', 'min:4', 'max:50'],
            'fecha_nac' => ['required', 'date']
        ],
        [
            'nombre.min'=>'El nombre debe tener minimo 3 caracteres',
            'nombre.max'=>'El nombre debe tener maximo 50 caracteres',

            'sueldo.numeric'=>'El sueldo debe ser numerco',

            'telefono.digits_between'=>'El telefono debe de tener minimon 8 numeros y maximo 10',
            'telefono.integer'=>'El telefono debe ser un numero',

            'puesto.min'=>'El puesto deb ser minimo 4 caracteres',
            'puesto.max'=>'El puesto deb ser maximo 50 caracteres',

            'fecha_nac.date'=>'La fecha debe ser una fecha',
        ]
        
        );
        
        

        Empleado::create($request->all());
        return view('inicio_empleados');

    }

    public function index()
    {
        $empleados = Empleado::all();
        return view('index_empleados', ['empleados' => $empleados]);
        
    }

    public function edit(Empleado $empleado)
    {
        return view('edit_empleado', compact('empleado'));
    }


    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            
            'nombre' => ['required', 'min:2', 'max:50'],
            'sueldo' => ['required', 'numeric'],
            'telefono' => ['required', 'integer'],
            'puesto' => ['required', 'min:2', 'max:50'],
            'fecha_nac' => ['required', 'date']

        ]);

        Empleado::where('id', $empleado->id)->update($request->except('_token', '_method'));

        return view('inicio_empleados');

    }

    public function show(Request $request){

        $empleado_id = $request -> input('id');
        $empleado = Empleado::find($empleado_id);

        if (!$empleado){
            return redirect()->back()->with('error','El empleado con ese id no existe');
        }

        return view('show_empleado', compact('empleado'));

    }



    public function delete($id)
    {
        $empleado_id = Empleado::find($id);

        $empleado_id->delete();

        return view('inicio_empleados');
    }

    

}
