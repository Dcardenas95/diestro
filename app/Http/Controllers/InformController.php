<?php

namespace App\Http\Controllers;

use App\Models\Inform;
use Illuminate\Http\Request;

class InformController extends Controller
{
    public function clear()
    {
        $informs = Inform::truncate();
        return view('table.index');
    }

    public function deleteregister(Inform $inform)
    {
        $inform->delete();
        $informs = Inform::all();

        // Guardar mensaje en la sesión
        session()->flash('success', 'registro eliminado!');

        return view('table.index', compact('informs'))->with('success', session('success'));
    }
}
