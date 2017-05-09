<h1>Ê×Ò³</h1>
<br/>

<div class="row">
    <div class="col-md-8">
        <div class="well well-home">
            <div class="row">
                <div class="col-md-7">
                    <h2>Hi <strong>{{ Auth::user()->name }}!</strong></h2>
                    <p>Welcome {{--{{ $firstTimer?'':'back ' }}--}}to the Coaster CMS control panel.</p>
                    <p>Click on the pages menu item to start editing page specific content, or for content on more than one page go to site-wide content.</p>
                </div>
                <div class="col-md-5 text-center">
                    <a href="{{ route('admin.account') }}" class="btn btn-default" style="margin-top:30px;">
                        <i class="fa fa-lock"></i>  &nbsp; Account settings
                    </a>
                    <a href="{{  route('Custom.Page', ['action' => 'help']) }}" class="btn btn-default" style="margin-top:30px;">
                        <i class="fa fa-life-ring"></i>  &nbsp; Help Docs
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-home">
            <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Version Details</h3>
            {{--<ul>
                <li><strong>Your site:</strong> {{ $upgrade->from }}</li>
                <li><strong>Latest version:</strong> {{ $upgrade->to }}</li>
            </ul>
            @if($upgrade->allowed && $upgrade->required)
                <p><a class="btn btn-primary" href="{{ route('coaster.admin.system.upgrade') }}">(upgrade)</a></p>
            @endif
            @if ($canViewSettings)
                <p><a href="{{ route('coaster.admin.system') }}" class="btn btn-default"><i class="fa fa-cog"></i> View all settings</a></p>
            @endif--}}
        </div>
    </div>
</div>