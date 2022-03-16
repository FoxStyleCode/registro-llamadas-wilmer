<div>

    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-full pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">

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

                <form class="w-96 max-w-lg">
                    <br>
                    <div class="flex flex-wrap px-10 -mx-3 mb-6">
                        <div class="w-80 md:w-1/3 py-4 px-3 md:mb-0 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Municipio
                            </label>
                            <input wire:model="municipality" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                            @error('municipality') <span class="error">{{$message}}</span>@enderror
                        </div>
                        <div class="w-80 md:w-1/3 px-3 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Tipo de llamada
                            </label>
                            <input wire:model="type" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('type') <span class="error">{{$message}}</span>@enderror
                        </div>
                        <div class="w-80 md:w-1/3 px-3 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Nombre del que llama
                            </label>
                            <input wire:model="caller_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('caller_name') <span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>


                    <div class="flex flex-wrap px-10 -mx-3 mb-6">
                        <div class="w-80 md:w-1/4 px-3 mb-6 md:mb-0 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Detalle de la llamada
                            </label>
                            <input wire:model="detail" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                            @error('detail') <span class="error">{{$message}}</span>@enderror
                        </div>
                        <div class="w-80 md:w-1/4 px-3 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Razón de la llamada
                            </label>
                            <input wire:model="reason" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('reason') <span class="error">{{$message}}</span>@enderror
                        </div>
                        <div class="w-80 md:w-1/4 px-3 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Respuesta de la llamada
                            </label>
                            <input wire:model="call_answer" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('call_answer') <span class="error">{{$message}}</span>@enderror
                        </div>
                        <div class="w-80 md:w-1/4 px-3 px-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Llamada respondida por
                            </label>
                            <input wire:model.defer="call_answer_by" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                            @error('call_answer_by') <span class="error">{{$message}}</span>@enderror
                        </div>
                    </div>

                    <div class="flex px-6 mb-5">
                        
                        <div class="w-50  px-3 mb-6 md:mb-0 px-2">
                            <button wire:click.prevent="submit()" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-blue-600 text-base leading-6 font-bold text-white shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" type="submit">
                                Guardar cambios
                            </button>
                        </div>
                    

                        <div class="w-50 px-3 mb-6 md:mb-0 px-2">
                            <button wire:click.prevent="closeModalPopover()" type="button"
                                class="inline-flex justify-center bg-gray-400 hover:bg-white w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-white shadow-sm hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cerrar
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
