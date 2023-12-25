<!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
<div data-te-datatable-init>
    <table>
        <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{$column}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($data as $value)
            <tr>
            @foreach($columns as $column)
                @if($column == 'delete')
                        <td>
                            <form action="{{route($route,['category'=>$value->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <x-secondary-button data-type="danger" type="submit">
                                    {{__('site.remove')}}
                                </x-secondary-button>
                            </form>
                        </td>
                @else
                        <td>{{$value->$column}}</td>
                @endif
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
