<?php

namespace App\Http\Controllers\Almacen;

use App\Http\Controllers\Controller;
use App\Models\Almacenes\Almacen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        return view('almacenes.index');
    }

    public function edit($id)
    {
        $almacen = Almacen::find($id);
        return view('almacenes.edit', compact('almacen'));
    }
    public function create()
    {
        return view('almacenes.create');
    }

    public function store(Request $request)
    {
        // Validamos los campos
        $data =  $this->validate($request, [
            'nombre' => 'required|max:200',
            'salon_id' => 'required|exists:salones,id', // ✅ Añadido


        ], [
            'nombre.required' => 'El nombre es requerido para continuar',
            'salon_id.required' => 'Debe seleccionar un salón válido',

        ]);

        // $data = $request->all();
        $salon = \App\Models\Salones\Salon::findOrFail($request->salon_id);
        $data['direccion'] = $salon->direccion;

        $crearDominio = Almacen::create($data);

        if (!$crearDominio) {

            return redirect()->back()->with('toast',[
                'icon' => 'error',
                'mensaje' => 'Error al crear el almacen'
            ]);
        }else{

            return redirect()->route('almacenes.index')->with('toast',[
                'icon' => 'success',
                'mensaje' => 'El almacen se creo correctamente'
            ]);
        }

    }

    public function update(Request $request, $id)
    {

        $almacen = Almacen::find($id);
        // Validamos los campos
        $data =  $this->validate($request, [
            'nombre' => 'required|max:200',
            'salon_id' => 'required|exists:salones,id', // ✅ Añadido
        ], [
            'nombre.required' => 'El nombre es requerido para continuar',
            'salon_id.required' => 'Debe seleccionar un salón válido',
        ]);

        $salon = \App\Models\Salones\Salon::findOrFail($request->salon_id);
        $data['direccion'] = $salon->direccion;
        $salonSaved=$almacen->update(attributes: $data);

        if (!$salonSaved) {

            return redirect()->back()->with('toast',[
                'icon' => 'error',
                'mensaje' => 'Error al actualizar el almacen'
            ]);
        }else{

            return redirect()->route('almacenes.index')->with('toast',[
                'icon' => 'success',
                'mensaje' => 'El almacen se actualizo correctamente'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $almacen = Almacen::find($request->id);

        if (!$almacen) {
            return response()->json([
                'error' => true,
                'mensaje' => "Error en el servidor, intentelo mas tarde."
            ]);
        }

        $almacen->delete();
        return response()->json([
            'error' => false,
            'mensaje' => 'El almacen fue borrado correctamente'
        ]);
    }

    public function show($id)
    {
        $almacen = Almacen::find($id);
        return view('almacenes.show', compact('almacen'));
    }
}
