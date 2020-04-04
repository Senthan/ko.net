
<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }} required">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
    </div>
</div>


<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }} required">
    {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => '3']) !!}
        <p class="help-block">{{ ($errors->has('description') ? $errors->first('description') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('date_of_start')) ? 'has-error' : '' }} required">
    {!! Form::label('date_of_start', 'Date of Start', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date_of_start', null, ['class' => 'form-control', 'placeholder' => 'Date of Start']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date_of_start') ? $errors->first('date_of_start') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('files')) ? 'has-error' : '' }} ">
    {!! Form::label('files', 'Files', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::file('files', null, ['class' => 'form-control', 'placeholder' => 'Files']) !!}
        <p class="help-block">{{ ($errors->has('files') ? $errors->first('files') : '') }}</p>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {

            $('#date_of_start').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>
@endsection
