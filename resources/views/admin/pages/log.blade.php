<?php  ?>


<ul class="nav nav-tabs" role="tablist">
    @foreach($data as $key=>$value)
    <li role="presentation" @if($key == 'net2ftp_user')class="active"@endif><a href="#{!! $key !!}" aria-controls="{!! $key !!}" role="tab" data-toggle="tab">{!! $key !!}</a></li>
        @endforeach
</ul>

<div class="tab-content">

    @foreach($data as $key=>$value)
        <div role="tabpanel"  @if($key == 'adminlog_view')class="tab-pane active" @else class="tab-pane" @endif id="{!! $key !!}">


            {!! $value !!}
        </div>
        @endforeach

</div>