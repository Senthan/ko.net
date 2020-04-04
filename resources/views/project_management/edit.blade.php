@extends('layouts.main_layout')
@section('content')

    <section class="content">
        {!! Form::model($project, ['url' => route('project.update', ['project' => $project]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH', 'files' => true]) !!}

        <div class="ui segments">
            <div class="ui segment clearfix">
                <h2 class="pull-left">Edit {!! $project->name !!}</h2>
                <div class="pull-right">
                    <a class="ui small button" href="{{ route('project.index') }}">Back</a>
                </div>
            </div>
            <div class="ui green segment">
                @include('project_management._form')
            </div>
            <div class="ui segment">
                <button class="ui small button blue" type="submit">Update</button>
                <a class="ui small button" href="{{ route('project.index') }}">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
