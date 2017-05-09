
<a href="{{ route('admin.menus.add') }}" class="btn btn-warning addButton" data-page="0"><i
            class="fa fa-plus"></i> &nbsp; 添加管理菜单</a>
<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Menu name</th>
        <th>Menu icon</th>
        <th>action </th>
        <th>控制器 </th>
        <th>操作</th>
    </tr>

    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->item_name !!}</td>
            <td>{!! $menu->icon !!}</td>
            <td>{!! $menu->action!!}</td>
            <td>{!! $menu->controller !!}</td>
            <td> <a href="{{ route('admin.menus.add', ['id' => $menu->am_id]) }}" class="btn btn-warning addButton">
                    <i class="fa fa-edit"></i> 编辑</a>
                <a href="{{ route('admin.menus.delete', ['id' => $menu->am_id]) }}" class="btn btn-warning addButton">
                    <i class="fa fa-trash "></i> 删除</a>
                 &nbsp;</td>
        </tr>

@endforeach
</table>