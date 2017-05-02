<h1>Menus Manage</h1>

<br/>

<?php  ?>


<ul class="nav nav-pills" role="tablist">
    @foreach($data as $key=>$value)
        <li role="presentation" @if($key == 'menus_view')class="active"@endif><a href="#{!! $key !!}" aria-controls="{!! $key !!}" role="tab" data-toggle="tab">{!! $key !!}</a></li>
    @endforeach
</ul>

<div class="tab-content">

    @foreach($data as $key=>$value)
        <div role="tabpanel"  @if($key == 'menus_view')class="tab-pane active" @else class="tab-pane" @endif id="{!! $key !!}">
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

