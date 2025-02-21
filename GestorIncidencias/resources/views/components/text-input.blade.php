@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-white']) }}>
