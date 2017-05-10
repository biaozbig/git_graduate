<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>操作的用户id</th>
        <th>记录</th>
        <th>创建时间 </th>
        <th>更新时间 </th>
        <th></th>
    </tr>

    @foreach($fmenus as $fmenu)
        <tr>
            <td>{!! $fmenu->id !!}</td>
            <td>{!! $fmenu->user_id !!}</td>
            <td>{!! $fmenu->log!!}</td>
            <td>{!! $fmenu->created_at!!}</td>
            <td>{!! $fmenu->update_at !!}</td>

        </tr>

@endforeach
</table>