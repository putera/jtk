<!DOCTYPE html>
<!--
#############################################################################
#  Copyright (c) {{ date('Y') }} by Zulkifli Mohamed (putera). All right reserved.
#  Hakcipta Terpelihara (c) {{ date('Y') }} oleh Zulkifli Mohamed (putera)
#
#  Developed & Published by Zulkifli Mohamed (putera)
#  https://www.github.com/putera
#############################################################################
//-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"@auth class="h-full bg-gray-100" @endauth>
<head>
<meta charset="UTF-8">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="developer" content="Zulkifli Mohamed a.K.a putera">
<meta name="copyright" content="Copyright (c) {{ date('Y') }} by Zulkifli Mohamed (putera). All right reserved.">
<meta name="description" content="@hasSection('site_description')@yield('site_description')@else{{  $config->site_description }}@endif">
<meta name="keywords" content="{{ str_replace(',' , ', ', $config->site_keywords) }}@hasSection('site_keywords'), @yield('site_keywords')@endif">
@if ($config->site_slogan)
<meta name="slogan" content="{{ $config->site_slogan }}">
@endif
<meta name="robots" content="index, follow">
<meta name="googlebot" content="noarchive">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@auth
<script>window.zf = {!! json_encode(['u' => System::crypt(auth()->user()->id)]) !!};</script>
@endauth
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}@hasSection('page_title') - @yield('page_title')@endif</title>
{{-- Favicons --}}
<link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.svg') }}">
<link rel="apple-touch-icon" href="{{ asset('images/favicon.svg') }}">
{{-- Styles --}}
<link href="{{ mix('css/font-awesome.min.css') }}" rel="stylesheet" data-turbo-track="reload" />
<link href="{{ mix('css/app.css') }}" rel="stylesheet" data-turbo-track="reload" />
@livewireStyles
@yield('styles')
{{-- Scripts --}}
@wireUiScripts
<script defer src="{{ mix('js/app.js') }}"></script>
@livewireScripts
<script src="{{ mix('js/livewire-turbolinks.js') }}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
@production
@if ($config->google_analytic)
{{-- Google Analytics --}}
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $config->google_analytic }}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '{{ $config->google_analytic }}');
@auth
gtag('set', {'user_id': {{ auth()->id() }}});
@endauth
</script>
@endif
@endproduction
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
</head>
{{ $slot }}
</html>
