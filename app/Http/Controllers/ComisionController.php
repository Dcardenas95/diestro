<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function showComision()
    {
        $comisiones = Comision::all();
        return view('comision.create', compact('comisiones'));
    }

    public function chooseComision()
    {
        $comisiones = Comision::all();
        return view('comision.create', compact('comisiones'));
    }

    public function chooseSave(Request $request)
    {

        $id = $request->value;
        
        // Establecer active = 0 en todos los demás modelos de Comision
        Comision::where('id', '!=', $id)->update(['active' => false]);

       
        $comision = Comision::findOrFail($id);
        $comision->active = true;
        $comision->save();

        return redirect()->route('user.choose.comision')
        ->with('success','Comision Guardada con exito!');
       
    }

    public function createComision(Request $request)
    {
        Comision::create($request->all());

        return redirect()->route('user.show.comision')
        ->with('success','Comision creada con exito!');
    }
}
