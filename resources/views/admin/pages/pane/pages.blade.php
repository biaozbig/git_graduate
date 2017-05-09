<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>模板</th>
        <th>标题</th>
        <th>作者 </th>
        <th>来源 </th>
        <th>分类 </th>
        <th>相关地址 </th>
        <th>操作</th>
    </tr>

    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->template !!}</td>
            <td>{!! $menu->title !!}</td>
            <td>{!! $menu->author!!}</td>
            <td>{!! $menu->source !!}</td>
            <td>{!! $menu->category !!}</td>
            <td> <a href="{{ route('Custom.Page', ['action' => $menu->relaive_url]) }}" class="btn btn-warning addButton">
                    <i class="fa fa-link"></i> {!! $menu->relaive_url !!}</a> &nbsp;</td>
            <td> <a href="{{ route('admin.pages.add', ['id' => $menu->id]) }}" class="btn btn-warning addButton">
                    <i class="fa fa-edit"></i> 编辑</a>
                <a href="{{ route('admin.pages.delete', ['id' => $menu->id]) }}" class="btn btn-warning addButton">
                    <i class="fa fa-trash "></i> 删除</a> &nbsp;</td>

        </tr>

    @endforeach
</table>