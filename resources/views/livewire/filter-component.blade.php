<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <div class="flex">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Información" wire:model="buscar">
                </div>
                <a
                href="{{ route('inform.delete') }}" 
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium 
                rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                onclick="return confirm('¿Estás seguro de deseas eliminar Todos los registros de la tabla?')"
                >Limpiar Tabla</a>
            </div>
        </div>
        
        <table class="text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cuenta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ot
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IdAsesor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NombreAsesor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comision
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Paquete
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CantServ
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo de red
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Division
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Zona
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Población
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Distrito
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tercero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Punto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Renta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grupo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Venta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo Registro
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Canal 2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        # Contrato
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estrato
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Paquete PG
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Paquete PVD
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cod Campaña
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Multiplay
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo de producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        GV-Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cod Tarifa
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informs as $inform)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <form method="POST"
								action="{{ route('inform.register.destroy', $inform) }}"
								style="display: inline">
								{{ csrf_field() }} {{ method_field('DELETE') }}
								<button
									onclick="return confirm('¿Estás seguro de quieres eliminar este registro?')"
								><i class="fa-solid fa-trash" style="color:red"></i></button>
							</form>
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->account }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->ot }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->id_adviser }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->name_adviser }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ($comision->value)/100 * $inform->rent}}  
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->package }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->cant_service }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->type_network }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->divide }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->area }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->zone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->population }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->distrite }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->tercero }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->point }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->rent }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->group }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->category }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->venta }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->type_register }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->channel }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->number_contract }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->social_class }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->package_pg }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->package_pvd }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->cod_campaign }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->multiplay }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->type_product }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->area_gv }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inform->cod_rate }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $informs->links() }}
       
    </div>
</div>
