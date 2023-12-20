<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mx-auto px-2 lg:container gap-6">
    <h2 class="col-span-1 sm:col-span-2 md:col-span-3 text-center my-6 font-extrabold text-gray-900 text-xl">{{__('site.dashboard.analytics')}}</h2>
        <div class="h-auto md:col-span-2">
            <canvas id="visitors" data-label="{{$visitorsLabel}}" data-value="{{$visitorsCount}}"></canvas>
        </div>
        <div class="h-64 mx-auto">
            <canvas id="categories" data-label="{{$categoriesLabel}}" data-value="{{$categoriesCount}}"></canvas>
        </div>
        <section class="w-full md:col-span-2">
            @include('dashboard.sitting')
        </section>
    </div>
</x-app-layout>