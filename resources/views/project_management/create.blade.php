@extends('layouts.main_layout')
@section('content')

    <section class="content">
        {!! Form::open(['url' => route('project.store'), 'role' => 'form', 'class' => 'form-horizontal ui form', 'files' => true]) !!}

        <div class="ui segments">
            <div class="ui segment clearfix">
                <div class="pull-right">
                    <a class="ui small button" href="{{ route('project.index') }}">Projects</a>
                </div>
            </div>
            <div class="ui green segment">
                @include('project_management._form')
            </div>
            <div class="ui segment">
                <<button class="ui small button green" type="submit">Save</button>
                <a class="ui small button" href="{{ route('project.index') }}">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection
