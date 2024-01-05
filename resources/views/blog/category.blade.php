<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">{{ $category->title  }}</h1>
    </x-slot>
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full xl:container px-4 mx-auto mt-6 gap-6">
        @foreach($posts as $post)
            <x-card :title="$post->title" :description="mb_substr(strip_tags($post->body),0,120).'...'" image="{{asset($post->photo())}}" :link="route('post',['slug'=>$post->slug()])" class="transition duration-200 hover:-translate-y-4 group" ></x-card>
        @endforeach
    </section>
    <x-navigation-pagination :pagination="$posts" />
</x-app-layout>
