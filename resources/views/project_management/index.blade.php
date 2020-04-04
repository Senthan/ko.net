@extends('layouts.main_layout')
@section('content')

    <div class="panel panel-default" data-ng-controller="ProjectController">
        <div class="panel-heading">
            <a href="{{ route('project.create') }}" class="ui small green button">Create</a>
            <a data-ng-show="selected" data-ng-href="@{{ edit_url }}" class="ui small blue button" data-ng-cloak>Edit</a>
            <a data-ng-show="selected" data-ng-href="@{{ delete_url }}" class="ui small red button" data-ng-cloak>Delete</a>
        </div>
        <div class="panel-body">
            <div>
                <div data-ui-grid="gridOptions" data-ui-grid-pagination data-ui-grid-selection class="grid"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    app.controller('ProjectController', ['$scope', '$http', function ($scope, $http) {
        $scope.moduleUrl = "{{ route('project.index') }}";
        $scope.projects = [];
        var columnDefs = [
            { displayName: 'Name', field: 'name'},
        ];
        gridOptions.columnDefs = columnDefs;
        gridOptions.onRegisterApi = function (gridApi) {
            $scope.gridApi = gridApi;
            gridApi.selection.on.rowSelectionChanged($scope,function(rows){
                $scope.setSelection(gridApi);
            });
            gridApi.selection.on.rowSelectionChangedBatch($scope,function(rows){
                $scope.setSelection(gridApi);
            });
        };
        $scope.gridOptions = gridOptions;

        $http.get($scope.moduleUrl).success(function (items){
            $scope.gridOptions.data =  [{!! $projects !!}][0];
        });
        $scope.setSelection = function(gridApi) {
            $scope.mySelections = gridApi.selection.getSelectedRows();
            if($scope.mySelections.length == 1) {
                $scope.selected = $scope.mySelections[0];
                $scope.show_url = $scope.moduleUrl + "/" + $scope.selected.id + '';
                $scope.edit_url = $scope.moduleUrl + "/" + $scope.selected.id + '/edit';
                $scope.delete_url = $scope.moduleUrl + "/"+ $scope.selected.id + '/delete';
            } else {
                $scope.selected = null;
            }
        };
    }]);
</script>

@endsection
