
<div class="form-group {{ ($errors->has('role')) ? 'has-error' : '' }}">
    {!! Form::label('role', 'role', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            <select class="form-control" name="role" id="role" required>
                <option value=""  selected>Select Role</option>
                @foreach($roles as $role)
                    @if($role->id!=1)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <p class="help-block">{{ ($errors->has('role') ? $errors->first('role') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            {!! Form::text('name', null, ['placeholder' => 'Name','style' => 'font-size: 15px;']) !!}
        </div>

        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
    {!! Form::label('email', 'email', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            {!! Form::text('email', null, ['placeholder' => 'email','style' => 'font-size: 15px;']) !!}
        </div>

        <p class="help-block">{{ ($errors->has('email') ? $errors->first('email') : '') }}</p>
    </div>
</div>


<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
    {!! Form::label('password', 'password', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            {!! Form::text('password', null, ['placeholder' => 'password','style' => 'font-size: 15px;']) !!}
        </div>

        <p class="help-block">{{ ($errors->has('password') ? $errors->first('password') : '') }}</p>
    </div>
</div>


<div class="form-group {{ ($errors->has('password-confirm')) ? 'has-error' : '' }}">
    {!! Form::label('password-confirm', 'password-confirm', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            {!! Form::text('password-confirm', null, ['placeholder' => 'password-confirm','style' => 'font-size: 15px;']) !!}
        </div>

        <p class="help-block">{{ ($errors->has('password-confirm') ? $errors->first('password-confirm') : '') }}</p>
    </div>
</div>
