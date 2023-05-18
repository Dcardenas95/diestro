<?php

namespace App\Http\Controllers;

use App\Models\Inform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    public function seeInform()
    {
        $user = Auth::user();
        
        $informs = Inform::where('id_adviser', $user->cedula)
        ->get();

        return view('table.index', ['informs' => $informs]);
        
    }
}
