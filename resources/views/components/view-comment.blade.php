@foreach($comments as $comment)
    <x-card-layout class="{{$attributes->get('class')}}">
        <h4 class="font-bold text-xl mb-4">{{$comment->user()->value('name')}}</h4>
        <p>{{$comment->body}}</p>
    </x-card-layout>
@endforeach
