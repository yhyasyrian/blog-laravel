<form method="post" action="{{route('comment',['post'=>$postId])}}">
    @csrf
    <h3 class="mb-2 text-2xl font-bold">{{__('site.comment.add')}}</h3>
    @auth
        <x-text-input type="textarea" name="comment" id="comment" label="comment" rows="3" />
        <!--Submit button-->
        <x-primary-button type="submit">{{__('site.comment.add')}}</x-primary-button>
    @else
        <p class="text-lg text-danger font-extrabold">{{__('site.comment.cannot')}}</p>
    @endauth
</form>

