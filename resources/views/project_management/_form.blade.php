<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            {!! Form::text('name', null, ['placeholder' => 'Name','style' => 'font-size: 15px;']) !!}
        </div>

        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
    </div>
</div>
