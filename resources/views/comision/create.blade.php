@extends('dashboard')
@section('comision')
  <div class="flex max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
    <!-- component -->
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-blue-700 
    md:text-5xl lg:text-6xl dark:text-white">Reglas de comision :</h1>
  </div>
  <div class="mt-12">
    <label for="large-input" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Comision Del calculo (%)</label>
    <form action = "{{route('comision.create') }}" method="post" class="flex">
      @csrf
      <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm 
      rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64  dark:bg-gray-700 dark:border-gray-600
      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
      name="value"
      placeholder="Por favor Ingresar El Porcentaje" required>
      <button type="submit" class="text-white h-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg 
      text-sm px-2  ml-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear Comision</button>
    </form>
  </div>

  <div>
    <br>
    <h2>Selecciona Tu Comision</h2>
    <form method="POST" action="{{ route('comision.choose.store') }}">
        @csrf
        @foreach($comisiones as $key => $comision)
        <div class="flex items-center mb-4">
            <input id="default-radio-1" type="radio" value="{{$comision->id}}" 
            name="value" 
            {{ $comision->active ? 'checked' : '' }}
            class="w-4 h-4 text-blue-600 bg-gray-100 
            border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$comision->value}}%</label>
        </div>
        @endforeach
        <button type="submit" class="text-white h-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg 
        text-sm px-2  ml-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Escoger Comision</button>
    </form>
</div>
@endsection