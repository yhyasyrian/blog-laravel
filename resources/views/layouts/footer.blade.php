@use('App\Http\Controllers\Const\Links')
<footer class="bg-white dark:bg-gray-900 dark:border-t py-6">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
        <div>
            <h3 class="text-xl font-bold capitalize mb-2 pb-2 border-b">{{__('site.categories')}}</h3>
            <nav class="flex flex-col gap-y-4">
                @foreach(Links::categories() as $category)
                    <a href="{{route('category',['slug'=>$category->slug])}}" class="link">{{$category->title}}</a>
                @endforeach
            </nav>
        </div>
        <div>
            <h3 class="text-xl font-bold capitalize mb-2 pb-2 border-b">{{__('site.post.last_posts')}}</h3>
            <nav class="flex flex-col gap-y-4">
                @foreach(Links::lastPosts() as $post)
                    <a href="{{route('post',['slug'=>$post->seo()->value('slug')])}}" class="link">{{$post->title}}</a>
                @endforeach
            </nav>
        </div>
        <div>
            <h3 class="text-xl font-bold capitalize mb-2 pb-2 border-b">{{Links::getSitting('title')}}</h3>
            <p>{{Links::getSitting('description')}}</p>
            <hr class="my-2">
            <h3 class="text-xl font-bold capitalize my-2 pb-2 border-b">{{__('site.social_media')}}</h3>
            <nav class="flex flex-row gap-4">
                @foreach(Links::socialMedia() as $key => $socialMedia)
                    @if(!empty($socialMedia['link']))
                        <a href="{{$socialMedia['link']}}" class="h-10 fill-black dark:fill-white hover:fill-primary dark:hover:fill-primary transition-all duration-100 ease-linear"><x-icon-social-media :icon="$socialMedia['social']" /></a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
    <hr class="my-2">
    <p class="text-center">{{__('site.copy_right')}} &copy; {{date('Y')}} {{Links::getSitting('title')}}</p>
</footer>
