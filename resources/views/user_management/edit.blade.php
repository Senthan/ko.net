@extends('layouts.main_layout')
@section('content')

    <section class="content">
        {!! Form::model($user, ['url' => route('user.update', ['user' => $user]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH']) !!}

        <div class="ui segments">
            <div class="ui segment clearfix">
                <h2 class="pull-left">Edit {!! $user->name !!}</h2>
                <div class="pull-right">
                    <a class="ui small button" href="{{ route('user.index') }}">Back</a>
                </div>
            </div>
            <div class="ui green segment">
                @include('user_management._form')
            </div>
            <div class="ui segment">
                <button class="ui small button blue" type="submit">Update</button>
                <a class="ui small button" href="{{ route('user.index') }}">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
