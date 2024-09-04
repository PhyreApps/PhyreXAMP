<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#1e1e1e] dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            PhyreXAMP
        </title>


        @livewireStyles


    </head>

    <body class="h-full text-white">

    <div>
        @livewire('xamp')
    </div>


        @livewireScripts

    </body>
</ht
