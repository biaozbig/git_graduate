<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>模板</th>
        <th>标题</th>
        <th>作者 </th>
        <th>来源 </th>
        <th>分类 </th>
        <th>相关地址 </th>
        <th>相关内容 </th>
        <th></th>
    </tr>

    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->id !!}</td>
            <td>{!! $menu->template !!}</td>
            <td>{!! $menu->title !!}</td>
            <td>{!! $menu->author!!}</td>
            <td>{!! $menu->source !!}</td>
            <td>{!! $menu->category !!}</td>
            <td>{!! $menu->relaive_url !!}</td>
            <td>{!! $menu->content !!}</td>

        </tr>

    @endforeach
</table>