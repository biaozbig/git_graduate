<?php ?>
<div class="row textbox">
    <div class="col-sm-6">
        <h3>所有使用在线ftp人员</h3>
    </div>

</div>
<table  class="table table-bordered">
    <tr>
        <th>#</th>
        <th>名字</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    @foreach($value as $key=>$item)
        <tr>
            <td>{!! $key !!}</td>
            <td>{!! $item->ftpserver !!}</td>
            <td>{!! $item->username !!}</td>
            <td>{!! $item->homedirectory !!}</td>
        </tr>


    @endforeach
</table>
