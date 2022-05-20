<div>
    <x-slot name="header">
        <h2 class="text-center">Registro de llamadas</h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="flex flex-wrap m-0">
                    <div class="w-80 md:w-1/2 px-3 mb-6 md:mb-0">
                        
                        <div className="flex items-center max-w-md shadow rounded border-0 p-3">
                            <input type="search" className="flex-grow py-2" placeholder="Buscar por municipio..." />
                            <i className="fas fa-search flex-grow-0 py-2 px-2" />
                        </div>

                    </div>
                    <div class="w-80 md:w-1/2 px-3 ">

                        <div className="flex items-center max-w-md shadow rounded border-0 p-3">
                            <button wire:click.prevent="exports()"
                                class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Descargar reporte</i></button>
                        </div>

                    </div>
                </div>
                
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <button wire:click="create()"
                    class="my-4 inline-flex text-2xl justify-center w-full rounded-md border border-transparent px-4 py-2 bg-sky-600  font-bold text-white shadow-sm hover:bg-blue-700">
                    Registrar llamada
                </button>
                @if($isModalOpen)
                    @include('livewire.llamadas')
                @endif

                <div style="overflow-x: auto">

                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Municipio</th>
                            <th class="px-4 py-2">Tipo de llamada</th>
                            <th class="px-4 py-2">nombre de la persona </th>
                            <th class="px-4 py-2">detalle</th>
                            <th class="px-4 py-2">rason</th>
                            <th class="px-4 py-2">respuesta a llamadas </th>
                            <th class="px-4 py-2">quien responde </th>
                            <th class="px-4 py-2">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($llamadas as $llamada)
                        <tr>
                            <td class="border px-4 py-2">{{$llamada->municipality}}</td>
                            <td class="border px-4 py-2">{{$llamada->type}}</td>
                            <td class="border px-4 py-2">{{$llamada->caller_name}}</td>
                            <td class="border px-4 py-2">{{$llamada->detail}}</td>
                            <td class="border px-4 py-2">{{$llamada->reason}}</td>
                            <td class="border px-4 py-2">{{$llamada->call_answer}}</td>
                            <td class="border px-4 py-2">{{$llamada->call_answer_by}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{$llamada->id}})"
                                    class="flex px-4 py-2 bg-gray-100 text-gray-900 cursor-pointer"><i class="fas fa-edit"></i></button>
                                <button wire:click="delete({{$llamada->id}})"
                                    class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
    {{ $llamadas->withQueryString()->links() }}

</div>
