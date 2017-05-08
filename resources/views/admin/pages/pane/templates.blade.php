<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>标签</th>
        <th>模板路径</th>
        <th>创建时间 </th>
    </tr>

    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->label !!}</td>
            <td>{!! $menu->template !!}</td>
            <td>{!! $menu->created_at!!}</td>
        </tr>

    @endforeach
</table>