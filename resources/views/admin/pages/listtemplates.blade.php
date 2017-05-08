<div class="row">
    <div class="col-sm-6">
        <h1>模板管理</h1>
    </div>
    <div class="col-sm-6 text-right">

            <a href="{{ route('admin.template.add.page') }}" class="btn btn-warning addButton" data-page="0"><i
                        class="fa fa-plus"></i> &nbsp; 添加模板页</a>

    </div>
</div>
<br/>

<?php  ?>


<div class="tab-content">

    @foreach($data as $key=>$value)
        <div role="tabpanel"  @if($key == 'pages_view')class="tab-pane active" @else class="tab-pane" @endif id="{!! $key !!}">
            {!! $value !!}
        </div>
    @endforeach

</div>

