@extends('layouts.main_layout')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{!! $project->name !!}</h3>
        </div>
        <div class="panel-body">
            <div class="row">

            </div>
        </div>

        <div class="panel-footer">
            <a class="ui small button" href="{{ route('project.index') }}">Cancel</a>
        </div>
    </div>
@endsection
