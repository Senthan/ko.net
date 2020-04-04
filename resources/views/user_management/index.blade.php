@extends('layouts.main_layout')
@section('content')

    <div class="panel panel-default" data-ng-controller="UserController">
        <div class="panel-heading">
            <a href="{{ route('user.create') }}" class="ui small green button">Create</a>
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
    app.controller('UserController', ['$scope', '$http', function ($scope, $http) {
        $scope.moduleUrl = "{{ route('user.index') }}";
        $scope.staffs = [];
        var columnDefs = [
            { displayName: 'Name', field: 'name'},
            { displayName: 'Email', field: 'email'},
            { displayName: 'Active', field: 'is_active'}
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
            $scope.gridOptions.data =  [{!! $users !!}][0];
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
