@extends('layouts.main_layout')
@section('content')

    {!! Form::model($user, ['url' => route('user.destroy', ['user' => $user]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'DELETE']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="ui small button" href="{{ route('user.index') }}">User</a>
        </div>
        <div class="panel-body">
            @if($errors->has('id'))
            <p class="alert alert-info">{{ $errors->first('id') }}</p>
            @else
                <p>Do you really want to delete this ({{ $user->name }}) user?</p>
            @endif
        </div>
        <div class="panel-footer">
            @unless($errors->has('id'))
                <button class="ui button red" type="submit">Delete</button>
            @endunless
                <a class="ui small button" href="{{ route('user.index') }}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
