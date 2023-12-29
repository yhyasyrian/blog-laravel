<x-card-layout
    {{ $attributes->merge(['class' => '']) }}
>
    <a href="{{$link}}">
        <img
            class="rounded-t-lg border-b-[1px] w-full object-cover aspect-video"
            src="{{$image}}"
            alt="{{$title}}" />
    </a>
    <div class="p-6">
        <h5
            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 break-words">
            <a href="{{$link}}">{{$title}}</a>
        </h5>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 break-words">
            {{$description}}
        </p>
        <a
            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] cursor-pointer"
            data-te-ripple-init
            data-te-ripple-color="light"
            href="{{$link}}">
            {{$button??__('site.readmore')}}
        </a>
    </div>
</x-card-layout>
