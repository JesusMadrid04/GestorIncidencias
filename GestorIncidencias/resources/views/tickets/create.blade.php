<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Ticket') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-10">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    <strong>{{ __('Ha ocurrido un error') }}</strong>
                </div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <x-input-label>
                        {{ __('Titulo') }}
                    </x-input-label>
                    <x-text-input type="text" name="title" required />
                </div>

                <div class="mb-4">
                    <x-input-label>
                        {{ __('Descripcion') }}
                    </x-input-label>
                    <textarea name="body" rows="4" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required></textarea>
                </div>

                <div class="mb-4">
                    <x-input-label>
                        {{ __('Categoria') }}
                    </x-input-label>
                    <select name="category" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                        <option value="Education">Educacion</option>
                        <option value="Technical">Tecnico</option>
                        <option value="Commentary">Comunicacion</option>
                    </select>
                </div>

                <div class="mb-4">
                    <x-input-label>
                        {{ __('Prioridad') }}
                    </x-input-label>
                    <select name="priority" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                        <option value="low">Baja</option>
                        <option value="medium" selected>Media</option>
                        <option value="high">Alta</option>
                    </select>
                </div>

                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Subir') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
