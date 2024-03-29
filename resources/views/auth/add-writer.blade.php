<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">{{__('site.rule.add')}}</h1>
    </x-slot>
    <section class="container mx-auto px-4 ">
        <form class="my-24" method="post" action="{{route('add-writer.store')}}">
            @csrf
            <x-text-input type="email" name="email" id="email" :label="__('auth.email')" required />
            <x-primary-button>{{__('site.rule.add')}}</x-primary-button>
        </form>
        @include('dashboard/table',[
            'columns' => ['name','email','delete'],
            'data' => $writers,
            'route' => 'removeWriter.destroy'
        ])
    </section>
</x-app-layout>
