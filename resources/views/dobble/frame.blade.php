<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:image" content="https://www.blikk.it/blikk_og_image.png">

    <title>{{ __('dobble.client.app_name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="min-h-screen bg-[#f7f5ef] text-slate-900 antialiased" data-translations='@json(__('dobble.client'))'>
    <header class="border-b border-slate-200 bg-[#FF9900]">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-5 sm:px-8">
            <a href="https://www.blikk.it" class="flex items-center gap-3 font-semibold tracking-tight">
                <img src="{{ asset('blikk_gross.png') }}" alt="blikk.it" class="h-8 w-auto">
                <span class="text-xl">{{ __('dobble.client.app_name') }}</span>
            </a>
            <div class="flex items-center gap-4">
                <span class="hidden text-sm text-slate-700 sm:block">{{ __('dobble.client.subtitle') }}</span>
                <form method="POST" action="{{ route('dobble.locale') }}" class="flex items-center gap-2">
                    @csrf
                    <label for="locale" class="sr-only">{{ __('dobble.client.language') }}</label>
                    <select id="locale" name="locale" onchange="this.form.submit()" class="rounded-lg border border-slate-700/30 bg-white px-2 py-2 text-sm">
                        @foreach (config('dobble.locales') as $locale)
                            <option value="{{ $locale }}" @selected(app()->getLocale() === $locale)>
                                {{ __('dobble.client.language_options.'.$locale) }}
                            </option>
                        @endforeach
                    </select>
                    <noscript>
                        <button type="submit" class="rounded-lg bg-white px-3 py-2 text-sm font-medium">{{ __('dobble.client.switch_language') }}</button>
                    </noscript>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 sm:py-12">
        @yield('main')
    </main>
    <footer class="py-8 text-center text-sm bg-[#FF9900]">
        <p>{{ __('dobble.client.footer') }}</p>
        <div>
            <p>&copy; <a class="text-red-700 hover:text-red-900" href="https://www.blikk.it">Bildungsserver blikk</a>
                <span>{{ __('dobble.client.department_prefix') }}
                    <a class="text-red-700 hover:text-red-900" href="https://deutsche-bildung.provinz.bz.it/de/didaktik-beratung">{{ __('dobble.client.education_department') }}</a>
                    - {{ __('dobble.client.city') }} {{ date('Y') }}
                </span>
            </p>
        </div>
    </footer>

    <script> var _blikk_no_load_scripts = true; </script>
    <script src="//www.blikk.it/scripts/scripts.js"></script>

</body>
</html>
