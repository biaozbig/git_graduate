<?php ?>
<div class="row textbox">
    <div class="col-sm-6">
        <h3>所有后台管理人员</h3>
    </div>

</div>
<table  class="table table-bordered">
    <tr>
        <th>#</th>
        <th>邮箱</th>
        <th>名字</th>
        <th>角色号（数字越小，权限越大）</th>
        <th>创建时间</th>
        <th>更新时间</th>
    </tr>
    @foreach($value as $key=>$item)
        <tr>
            <td>{!! $item->id !!}</td>
            <td>{!! $item->email !!}</td>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->role_id !!}</td>
            <td>{!! $item->created_at !!}</td>
            <td>{!! $item->update_at !!}</td>
        </tr>


    @endforeach
</table>
