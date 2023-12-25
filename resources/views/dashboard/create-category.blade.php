<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('site.category.new') }}
        </h1>
    </x-slot>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <div class="grid grid-cols-1 md:grid-cols-12 xl:container mx-auto px-2 my-6 gap-12">
        <div
            class="md:col-span-12 lg:col-span-9 block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <form enctype="multipart/form-data" method="post" action="{{route('category.store')}}">
                @csrf
                <x-text-input type="text" name="slug" id="slug" placeholder="slug" :label="__('site.category.slug')" />
                <x-text-input type="text" name="title" id="title" placeholder="title" :label="__('site.category.title')" />
                <x-text-input type="textarea" name="description" id="description" placeholder="description" :label="__('site.category.description')" rows="3" />
                <x-text-input type="file"
                              name="img"
                              id="img" :label="__('site.category.img')" accept="image/png, image/gif, image/jpeg" />
                <!--Submit button-->
                <x-primary-button style="width: 100%;">
                    {{__('site.save')}}
                </x-primary-button>
            </form>
        </div>
        <section class="md:col-span-12">
            @include('dashboard.table',[
                'columns' => ['id','slug','title','delete'],
                'data' => $categories,
                'route' => 'category.destroy'
            ])
        </section>
    </div>
</x-app-layout>
