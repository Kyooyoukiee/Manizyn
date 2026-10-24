@props(['name'])

<svg {{ $attributes->class('icon') }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    @switch($name)
        @case('logo')
            <path d="M4 18V6l4.1 6L12 6l3.9 6L20 6v12" />
            @break
        @case('sparkle')
            <path d="m12 3-1.45 5.55L5 10l5.55 1.45L12 17l1.45-5.55L19 10l-5.55-1.45L12 3Z" />
            <path d="m19 16-.58 2.42L16 19l2.42.58L19 22l.58-2.42L22 19l-2.42-.58L19 16Z" />
            @break
        @case('user-check')
            <circle cx="9" cy="7" r="3" />
            <path d="M3.5 20c.7-3.2 2.6-5 5.5-5 1.2 0 2.2.3 3 .8" />
            <path d="m15 17 2 2 4-4" />
            @break
        @case('smile')
            <circle cx="12" cy="12" r="8.5" />
            <path d="M8.5 14.5c1 1.2 2.15 1.8 3.5 1.8s2.5-.6 3.5-1.8M9 9.5h.01M15 9.5h.01" />
            @break
        @case('arrow-up-right')
            <path d="M7 17 17 7M9 7h8v8" />
            @break
        @case('bolt')
            <path d="m13 2-8 12h6l-1 8 8-12h-6l1-8Z" />
            @break
        @case('sun')
            <circle cx="12" cy="12" r="3.2" />
            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
            @break
        @case('cloud')
            <path d="M7.5 18.5h9a4 4 0 0 0 .5-7.97A5.5 5.5 0 0 0 6.55 9.1 4.7 4.7 0 0 0 7.5 18.5Z" />
            @break
        @case('badge')
            <path d="m12 3 2.3 2.3 3.2.45.45 3.2L20.25 11l-2.3 2.3-.45 3.2-3.2.45L12 19.25l-2.3-2.3-3.2-.45-.45-3.2L3.75 11l2.3-2.3.45-3.2 3.2-.45L12 3Z" />
            <path d="m9.3 11.3 1.75 1.75 3.65-3.65" />
            @break
        @case('heart')
            <path d="M20 8.8c0 5.2-8 10.2-8 10.2S4 14 4 8.8A4.2 4.2 0 0 1 12 6a4.2 4.2 0 0 1 8 2.8Z" />
            @break
        @case('chart')
            <path d="M4 19V5M4 19h16" />
            <path d="m7 15 3.1-3.2 2.7 1.8L18 8" />
            <path d="M15 8h3v3" />
            @break
        @case('users')
            <circle cx="9" cy="8" r="2.8" />
            <path d="M3.7 19c.45-3 2.15-4.6 5.3-4.6s4.85 1.6 5.3 4.6M16.2 5.8a2.5 2.5 0 0 1 0 4.8M17.8 14.4c1.45.65 2.3 2.2 2.5 4.1" />
            @break
        @case('arrow-left')
            <path d="M19 12H5M11 18l-6-6 6-6" />
            @break
        @case('arrow-right')
            <path d="M5 12h14M13 6l6 6-6 6" />
            @break
    @endswitch
</svg>
