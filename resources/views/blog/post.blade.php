<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">{{$post->title}}</h1>
    </x-slot>
    <section class="grid grid-cols-1 lg:grid-cols-12 w-full xl:container px-4 mx-auto mt-6 gap-6">
        <x-card-layout class="lg:col-span-9 p-6">
            <div class="img border mb-2 h-fit relative max-w-2xl mx-auto overflow-hidden rounded-md">
                <img src="{{asset($seo->image)}}" alt="{{$post->title}}"
                class="bord rounded-md object-cover aspect-video transition hover:scale-110 hover:rotate-3"
                >
            </div>
            <div class="post">
                {!! $post->body !!}
            </div>
            <div class="flex flex-row gap-x-2">
                <p class="text-lg font-bold">{{__('site.post.writer')}}</p>
                <p class="text-lg">{{$post->user()->first()->name}}</p>
            </div>
        </x-card-layout>
        <x-card-layout class="lg:col-span-3">
            <h2 class="text-center my-4 text-2xl font-extrabold">{{__('site.post.random')}}</h2>
            <div class="flex flex-col gap-y-12 mb-6">
                @foreach($postsRandom as $post)
                    <x-card :title="$post->title" :description="mb_substr(strip_tags($post->body),0,120).'...'" image="{{asset($post->photo())}}" :link="route('post',['slug'=>$post->slug()])" class="group max-w-[90%] mx-auto border" ></x-card>
                @endforeach
            </div>
        </x-card-layout>
        <x-card-layout class="lg:col-span-9 my-4 p-4">
            <x-create-comment/>
        </x-card-layout>
    </section>
</x-app-layout>
