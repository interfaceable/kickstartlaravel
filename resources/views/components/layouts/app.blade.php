<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"/>

  <meta name="application-name" content="{{ config('app.name') }}"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>{{ config('app.name') }}</title>

  <style>
      [x-cloak] {
          display: none !important;
      }
  </style>

  @filamentStyles
  @vite('resources/css/app.css')
</head>

<body class="antialiased bg-orange-50 dark:bg-gray-900 py-12">

<div class="container mx-auto sm:px-6 lg:px-8">
  <div class="md:flex md:items-center md:justify-between mb-8">
    <div class="min-w-0 flex-1">
      <h2 class="text-center text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
        {{ config('app.name') }}
      </h2>
      <p class="text-center mt-2 text-base text-gray-500">
        {{ __('Welcome to Kickstart Laravel. Find a list of community maintained starter kits for your next Laravel project') }}
      </p>
    </div>
  </div>

  {{ $slot }}
</div>


@livewire('notifications')

@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
