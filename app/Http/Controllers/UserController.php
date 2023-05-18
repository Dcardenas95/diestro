<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inform;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Password;

use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'vendedor')
        ->orderBy('name', 'asc')
        ->get();
        return view('users.index', ['users' => $users]);
    }

    public function showFormRegister()
    {
        $users = User::where('role', 'vendedor')
        ->orderBy('name', 'asc')
        ->get();
        return view('users.register', ['users' => $users]);
    }
    

    public function storeRegisterUser(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('user.index')
        ->with('success','Usuario Regustrado con exito!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function file()
    {
        return view('informs.index');

    }

    public function fileImportUser(Request $request)
    {
    
        if($request->hasFile('documento')) {
           
            $datos = Excel::toArray(new Inform, request()->file('documento'));
           

            if(!empty($datos) && count($datos)){

                unset($datos[0][0]);

               foreach ($datos as $key => $dato) {
                    $datosImportar[] = $dato;
               }
            }

         

            $datosImportar = collect($datosImportar[0])
            ->mapWithKeys(function ($data, $index) {
                return [
                    $index => [
                        'account' => $data[0],
                        'ot' => $data[1],
                        'id_adviser' => $data[2],
                        'name_adviser' => $data[3],
                        'package' => $data[4],
                        'cant_service' => $data[5],
                        'type_network' => $data[6],
                        'divide' => $data[7],
                        'area' => $data[8],
                        'zone' => $data[9],
                        'population' => $data[10],
                        'distrite' => $data[11],
                        'tercero' => $data[12],
                        'point' => $data[13],
                        'rent' => $data[14],
                        'group' => $data[15],
                        'category' => $data[16],
                        'date' => $data[17],
                        'venta' => $data[18],
                        'type_register' => $data[19],
                        'channel' => $data[20],
                        'number_contract' => $data[21],
                        'social_class' => $data[22],
                        'package_pg' => $data[23],
                        'package_pvd' => $data[24],
                        'cod_campaign' => $data[25],
                        'multiplay' => $data[26],
                        'type_product' => $data[27],
                        'area_gv' => $data[28],
                        'cod_rate' => $data[29]

                    ]
                ];
            });

            $values = $datosImportar->toArray();

            $comisiones = Comision::where('active',true)->first();

            if(!$comisiones){
                // Guardar mensaje en la sesión
                session()->flash('error', 'Por favor Cree una comision y seleccionela!');
                return redirect()->route('user.choose.comision' ,['comisiones' => $comisiones])
                ->with('error', session('error'));
            }


            
            Inform::insert($values);
        }

        // Guardar el modelo y mostrar un mensaje flash
        return back()->with('success','Archivo cargado con exito!');
    }

    public function seeInform()
    {

        return view('table.index');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function  edit(User $user)
    {   
        return view('users.update', ['user' => $user]);
    }

    /**
     * Update the user's profile information.
     * 
     * 
     */
    public function update(Request $request, User $user)
    {
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    
        $users = User::where('role', 'vendedor')
        ->orderBy('name', 'asc')
        ->get();

        return view('users.index', ['users' => $users]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        $users = User::where('role', 'vendedor')
        ->orderBy('name', 'asc')
        ->get();

        // Guardar mensaje en la sesión
        session()->flash('error', 'Usuario eliminado!');

        return view('users.index', ['users' => $users])->with('error', session('error'));
    }
}
