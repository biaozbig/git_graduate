<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Menu name</th>
        <th>Menu icon</th>
        <th>action </th>
        <th>控制器 </th>
        <th></th>
    </tr>

    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->item_name !!}</td>
            <td>{!! $menu->icon !!}</td>
            <td>{!! $menu->action!!}</td>
            <td>{!! $menu->controller !!}</td>

        </tr>

@endforeach
</table>