
<?php AssetBuilder::setStatus('cms-editor', true); ?>
<form accept-charset="UTF-8" class="form-horizontal"
        action="{!! $action !!}" method="{!! $method !!}"  @if($is_multipart) enctype="multipart/form-data" @endif>

    @foreach($inputdatas as $inputdata)
        <div class="form-group ">
            <label class="control-label col-sm-2">{!! $inputdata['label'] !!}</label>

            <div class="col-sm-10">
                <input  class="form-control " type="{!! $inputdata['type'] !!}" name="{!! $inputdata['name'] !!}" id="{!! $inputdata['id'] !!}" value="{!! $inputdata['value'] !!}">
                <span class="help-block"></span>
            </div>
        </div>


    @endforeach

    <input type="hidden" name="id"  value="{{ $id }}">
        {{ csrf_field() }}
    {!! $content !!}
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-2 ">
                <input  class="form-control " type="submit" value="submit" />
            </div>
        </div>




</form>
@section('scripts')
    <script type='text/javascript'>

    </script>
@stop