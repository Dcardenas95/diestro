
@extends('dashboard')

@section('users')
    <a href="{{ route('user.show.form') }}">
      <button type="button" id="hide-section-button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br 
      focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 
      py-2.5 text-center mr-2 mb-2">Usuario <i class="fa-solid fa-user-plus"></i></button>
    </a>
    @if ($__env->hasSection('users-register'))
        @yield('users-register')
    @elseif ($__env->hasSection('users-update'))
        @yield('users-update')
    @else
        <div>
            <table id="section-to-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-blue-600 bg-blue-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->name}}
                        </th>
                        <td class="px-6 py-4">
                        {{$user->email}}
                        </td>
                        <td class="px-6 py-4">
                        {{$user->role}}
                        </td>
                        <td class="px-6 py-4">
                        
                        <a href="{{ route('user.seller.edit', $user) }}"
                            class="btn btn-xs btn-info"
                        ><i class="fa-solid fa-pen-to-square text-green-500"></i></a>


                        <form method="POST"
								action="{{ route('user.seller.destroy', $user) }}"
								style="display: inline">
								{{ csrf_field() }} {{ method_field('DELETE') }}
								<button class="btn btn-xs btn-danger"
									onclick="return confirm('¿ Estás seguro de querer eliminar el usuario {{$user->name}} ?')"
								><i class="fa-sharp fa-solid fa-trash text-red-500"></i></button>
                        </form>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

   


