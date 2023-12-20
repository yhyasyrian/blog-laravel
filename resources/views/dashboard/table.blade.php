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
                <td>{{$value->$column}}</td>
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
