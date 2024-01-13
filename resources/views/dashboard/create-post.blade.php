@use('App\Http\Controllers\Const\Links')
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('site.post.new') }}
        </h1>
    </x-slot>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <x-creates>
        <div
            class="md:col-span-12 lg:col-span-9 block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 post">
            <form enctype="multipart/form-data" method="post" action="{{isset($currentPost) ? route('post.update',['post'=>$currentPost->id]) : route('post.store')}}">
                @csrf
                @isset($currentPost)
                    @method('PUT')
                @endisset
                <x-text-input type="text" name="slug" id="slug" :value="isset($currentPost) ? $currentPost->seo()->value('slug') : null" placeholder="slug" :label="__('site.category.slug')" />
                <x-text-input type="text" name="title" id="title" :value="isset($currentPost) ? $currentPost->title : null" placeholder="title" :label="__('site.category.title')" />
                <x-text-input type="textarea" name="description" :value="isset($currentPost) ? $currentPost->seo()->value('description') : null" id="description" placeholder="description" :label="__('site.category.description')" rows="3" />
                <div class="mb-2">
                    <label
                        for="body"
                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    >{{__('site.post.body')}}:</label
                    >
                    <textarea id="body" name="body">{!! $currentPost->body ?? old('body') !!}</textarea>
                </div>
                <select name="category_id" id="category_id" data-te-select-init>
                        @foreach(Links::categories() as $category)
                            <option value="{{$category->id}}">{{$category->slug}}</option>
                        @endforeach
                </select>
                <x-text-input type="file"
                              name="img"
                              id="img" :label="__('site.category.img')" accept="image/png, image/gif, image/jpeg" />
                <!--Submit button-->
                <x-primary-button style="width: 100%;">
                    {{__('site.save')}}
                </x-primary-button>
            </form>
        </div>
        {{-- Test title and description --}}
        <div class="md:col-span-12 lg:col-span-3 block h-fit rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 flex flex-col gap-4">
            @foreach(['title','description'] as $value)
                <div class="{{$value}}">
                    <div class="flex flex-row gap-x-2">
                        <h3 class="font-extrabold">{{lcfirst($value)}}:</h3>
                        <div data-type="bad" id="{{$value}}-type-progress">
                            <span class="excellent">{{__('site.post.type.excellent')}}</span>
                            <span class="good">{{__('site.post.type.good')}}</span>
                            <span class="bad">{{__('site.post.type.bad')}}</span>
                        </div>
                    </div>
                    <div class="w-full bg-neutral-200 dark:bg-neutral-600">
                        <div
                            class="max-w-full p-0.5 text-center text-xs font-medium leading-none"
                            style="width: 0%" id="{{$value}}-progress" data-progress="bad">
                            <span id="{{$value}}-progress-number">0</span>%
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <section class="md:col-span-12">
            @include('dashboard.table',[
                'columns' => ['id','title','delete'],
                'data' => $posts,
                'route' => 'post.destroy'
            ])
        </section>
            <x-navigation-pagination class="md:col-span-12" :pagination="$posts" />
        </div>
    </x-creates>
    <script src="https://cdn.tiny.cloud/1/{{config('app.tiny')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin" async></script>
</x-app-layout>
