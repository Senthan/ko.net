@extends('layouts.main_layout')
@section('content')

    <section class="content">
        {!! Form::open(['url' => route('user.store'), 'role' => 'form', 'class' => 'form-horizontal ui form']) !!}

        <div class="ui segments">
            <div class="ui segment clearfix">
                <div class="pull-right">
                    <a class="ui small button" href="{{ route('user.index') }}">User</a>
                </div>
            </div>
            <div class="ui green segment">
                @include('user_management._form')
            </div>
            <div class="ui segment">
                <<button class="ui small button green" type="submit">Save</button>
                <a class="ui small button" href="{{ route('user.index') }}">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection
