<div class="table-responsive">
    <form accept-charset="UTF-8" class="form-horizontal"
          action="{!! $action !!}" method="{!! $method !!}" >
    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($site_details as $setting)
            <tr>
                <td>{!!$setting->label !!}</td>
                <td>
                    <?php $inputDetails = ($setting->editable) ? ['class' => 'form-control'] : ['class' => 'form-control', 'disabled' => true]; ?>
                    @if (is_string($setting->value))
                        {!! Form::text($setting->name, $setting->value, $inputDetails) !!}
                        @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">

    </table>
    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-2 ">
            <input  class="form-control " type="submit" value="submit" />
        </div>
    </div>
    </form>
</div>