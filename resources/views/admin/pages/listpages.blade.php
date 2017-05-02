<div class="row">
    <div class="col-sm-6">
        <h1>Pages Manage</h1>
    </div>
    <div class="col-sm-6 text-right">

            <a href="{{ route('admin.pages.add') }}" class="btn btn-warning addButton" data-page="0"><i
                        class="fa fa-plus"></i> &nbsp; Add Page</a>

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

{{--<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Menu name</th>
        <th>Menu icon</th>
        <th>Menu </th>
        <th>action </th>
        <th></th>
    </tr>

    @foreach($menus as $menu)
    <tr>
        <td>{!! $menu->id !!}</td>
        <td>{!! $menu->item_name !!}</td>
        <td>{!! $menu->icon !!}</td>
        <td>{!! $menu->action_id !!}</td>
        <td>{!! $menu->action->action !!}</td>
    </tr>

    @endforeach--}}

