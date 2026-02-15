@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-3 py-3 rounded-xl bg-gradient-primary text-white shadow-lg shadow-indigo-500/25 group'
            : 'flex items-center gap-3 px-3 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-primary transition-colors group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
