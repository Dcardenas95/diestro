
@extends('dashboard')

@section('file')
  <div class="flex items-center justify-center max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
    <!-- component -->
    <a class="block max-w-xl h-auto p-6 bg-white border border-gray-200 rounded-lg shadow-xl 
      ">
        <p class="text-blue-900 text-2xl font-bold">Por favor adjuntar archivo en excel :</p>
        <form action = "{{route('user.import.file') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input class="block w-full mt-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
          bg-gray-50 focus:outline-none" aria-describedby="file_input_help" id="file_input" name="documento"  required  type="file">
          <button type="submit" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg 
          text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Importar Excel</button>
        </form>
    </a>
  </div>
@endsection
