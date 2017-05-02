<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Menu name</th>
        <th>Menu icon</th>
        <th>action </th>
        <th>控制器 </th>
        <th></th>
    </tr>

    @foreach($fmenus as $fmenu)
        <tr>
            <td>{!! $fmenu->id !!}</td>
            <td>{!! $fmenu->item_name !!}</td>
            <td>{!! $fmenu->icon !!}</td>
            <td>{!! $fmenu->route_name!!}</td>
            <td>{!! $fmenu->item_desc !!}</td>

        </tr>

@endforeach
</table>