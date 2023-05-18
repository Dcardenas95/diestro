<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar"
                aria-controls="cta-button-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

            <aside id="cta-button-sidebar"
                class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-blue-400 dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">{{ Auth::user()->name }}<svg class="w-4 h-4 ml-2" aria-hidden="true"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perfil</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="{{ route('logout') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                Cerrar Sesión
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if (Auth::check())
                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('user.index') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <svg aria-hidden="true"
                                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.choose.comision') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-money-bill-trend-up text-gray-500"
                                        style="font-size:24px;padding-right:10px"></i>
                                        <span class="flex-1 whitespace-nowrap" >Comisiones</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.file') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-file-excel text-gray-500"
                                            style="font-size:24px;padding-right:6px"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Subir Archivo</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.see.inform') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fa-sharp fa-solid fa-table-list text-gray-500"
                                            style="font-size:24px;padding-right:6px"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Ver información</span>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('vendedor.see.inform') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fa-sharp fa-solid fa-table-list text-gray-500"
                                            style="font-size:24px;padding-right:6px"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Ver información</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </aside>


            <div class="p-4 sm:ml-64">
                @include('components.modal-alert')
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

                    <div class="mb-4 rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            @yield('users')
                            @yield('comision')
                            @yield('file')
                            @yield('table')
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
