<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('site.category.new') }}
        </h1>
    </x-slot>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <x-creates>
        <script src="https://cdn.tiny.cloud/1/{{config('app.tiny')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <div
            class="md:col-span-12 lg:col-span-9 block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <form enctype="multipart/form-data" method="post" action="{{route('post.store')}}">
                @csrf
                <x-text-input type="text" name="slug" id="slug" placeholder="slug" :label="__('site.category.slug')" />
                <x-text-input type="text" name="title" id="title" placeholder="title" :label="__('site.category.title')" />
                <x-text-input type="textarea" name="description" id="description" placeholder="description" :label="__('site.category.description')" rows="3" />
                <div class="mb-2">
                    <label
                        for="body"
                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    >{{__('site.post.body')}}:</label
                    >
                    <textarea id="body" name="body">{{old('body')}}</textarea>
                </div>
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

        </section>
    </x-creates>
</x-app-layout>
