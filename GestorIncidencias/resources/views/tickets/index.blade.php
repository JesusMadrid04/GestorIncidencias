<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-xl">{{ __('Tus Tickets') }}</h3>

                    @if($tickets->isEmpty())
                        <p>{{ __('No hay tickets.') }}</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($tickets as $ticket)
                                <form action="{{ route('tickets.destroy', $ticket['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <li class="border p-4 rounded-md shadow-sm bg-gray-50 dark:bg-gray-700">
                                        <h4 class="font-bold">{{ $ticket->title }}</h4>
                                        <p class="text-gray-600 dark:text-gray-300">{{ $ticket->body }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Categoria: ') . $ticket->category }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Prioridad: ') . $ticket->priority }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Estatus: ') . ucfirst($ticket->status) }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Creado el: ') . $ticket->created_at->diffForHumans() }}</p>
                                        <div class="mt-6 flex justify-end">
                                            <x-danger-button>
                                                {{ __('Eliminar') }}
                                            </x-danger-button>
                                        </div>
                                    </li>
                                </form>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
