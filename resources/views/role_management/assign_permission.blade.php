@extends('layouts.main_layout')

@section('stylesheets')

@endsection

@section('title', 'Permission Management')
@section('heading', 'Permission Management')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">

                <div class="box box-success">
                
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr class="custom-bold-color" style="font-weight: 600; text-shadow: 1px 1px 1px gray; color: white; background: #0BC46B">
                                    <th style="text-align: center;" colspan="14">{{ $role->name }}</th>
                                </tr>
                                <tr class="bg-success custom-bold-color" style="font-weight: 600; text-shadow: 1px 1px 1px white;">
                                    <th style="width: 30%">
                                        Model
                                        @can('edit', App\Role::class)
                                        <div class="ui toggle checkbox enable-edit" style="float: right;">
                                            <input style="float: right;" class="enable-edit" type="checkbox" name="enable-edit"/>
                                            <label>Edit</label>
                                        </div>
                                        @endcan
                                    </th>
                                    <th colspan="13" style="text-align: center;">
                                        Action
                                        <div class="ui toggle checkbox check-all-setting" style="float: right;">
                                            <input style="float: right;" class="check-all" type="checkbox" name="check-all"/>
                                            <label>Check All</label>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="bg-success custom-bold-color" style="font-weight: 600; text-shadow: 1px 1px 1px white;">
                                    <th></th>
                                    <th>
                                        <label>Menu</label>
                                        <div class="ui toggle checkbox check-all-menu" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" data-module="index" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Create</label>
                                        <div class="ui toggle checkbox check-all-create" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" data-module="create" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>View</label>
                                        <div class="ui toggle checkbox check-all-view" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" data-module="show" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Edit</label>
                                        <div class="ui toggle checkbox check-all-edit" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" data-module="edit" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Delete</label>

                                        <div class="ui toggle checkbox check-all-delete" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" data-module="delete" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Import</label>

                                        <div class="ui toggle checkbox check-all-import" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all"  data-module="import" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Export</label>

                                        <div class="ui toggle checkbox check-all-export" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all"  data-module="export" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Report</label>

                                        <div class="ui toggle checkbox check-all-report" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" type="checkbox" data-module="report" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>History</label>

                                        <div class="ui toggle checkbox check-all-history" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" type="checkbox" data-module="history" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label title="Print Letter">Print.L</label>

                                        <div class="ui toggle checkbox check-all-printletter" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" type="checkbox" data-module="printLetter" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label title="Batch Change Client">Batch C.C</label>

                                        <div class="ui toggle checkbox check-all-changeClient" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" type="checkbox" data-module="changeClient" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label title="Batch ReAssign Agent">Batch R.A</label>

                                        <div class="ui toggle checkbox check-all-reAssignAgent" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all" type="checkbox" data-module="reAssignAgent" name="check-all"/>
                                        </div>
                                    </th>
                                    <th>
                                        <label>Others</label>

                                        <div class="ui toggle checkbox check-all-auditlog" style="float: right;margin-top: 3px;">
                                            <input style="float: right;" class="check-all"  data-module="auditlog" type="checkbox" name="check-all"/>
                                        </div>
                                    </th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($policies as $policy)
                                    <tr>
                                        <td>
                                            @can('edit', App\Role::class)
                                                <a class="description hidden" href="#"  data-pk="{{ $policy->id }}" data-url="{{ route('policy.update', ['policy' => $policy->id]) }}" name="description">{{ $policy->description }} <i class="fa fa-pencil"></i> </a><br/>
                                                <a class="briefing-description hidden" href="#"  data-pk="{{ $policy->id }}" data-url="{{ route('policy.description.update', ['policy' => $policy->id]) }}" name="description">{{ $policy->module_description }}<i class="fa fa-pencil"></i> </a>
                                                <span class="module-description" data-tooltip="{{ $policy->module_description }}" data-position="top left">{{ $policy->description }}</span>
                                            @endcan
                                            @cannot('edit', App\Role::class)
                                                <span class="module-description" data-tooltip="{{ $policy->module_description }}" data-position="top left">{{ $policy->description }}</span>
                                            @endcannot
                                        </td>
                                        
                                        @if($policyMethod = $policy->policyMethods->where('name', 'index')->first())
                                        <td>
                                            <input data-tooltip="Menu" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method index" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'create')->first())
                                        <td>
                                            <input data-tooltip="Create" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method create" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'show')->first())
                                        <td>
                                            <input data-tooltip="View" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method show" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'edit')->first())
                                        <td>
                                            <input data-tooltip="Edit" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method edit" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'delete')->first())
                                        <td>
                                            <input data-tooltip="Delete" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method delete" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'import')->first())
                                        <td>
                                            <input data-tooltip="Import" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method import" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'export')->first())
                                        <td>
                                            <input data-tooltip="Export" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method export" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'report')->first())
                                        <td>
                                            <input data-tooltip="Report" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method report" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'history')->first())
                                        <td>
                                            <input data-tooltip="History" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method history" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'printLetter')->first())
                                        <td>
                                            <input data-tooltip="Print Letter" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method printLetter" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'changeClient')->first())
                                            <td>
                                                <input data-tooltip="Change Client" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method changeClient" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'reAssignAgent')->first())
                                            <td>
                                                <input data-tooltip="ReAssign Agent" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method reAssignAgent" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if($policyMethod = $policy->policyMethods->where('name', 'auditlog')->first())
                                            <td>
                                                <input data-tooltip="{{ ($policy->name == 'DebtorDetailPolicy') ? 'Personal Data' : (($policy->name == 'DebtorFollowUpPolicy') ? 'Audio Play' : 'Audit log') }}" data-position="top left" type="checkbox" value="{{ $policyMethod->id }}" id="index" name="index" class="minimal auth-policy-method auditlog" {{ $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first() && $role->policyMethods->where('policy_id', $policy->id)->where('name', $policyMethod->name)->first()->pivot->authorized ? 'checked' : '' }}/>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- semantic ui -->
    <script src="{{ asset('plugins/semanticui/semantic.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var errorCallBack = false;

            $('.auth-policy-method').click(function() {

                if(errorCallBack) {
                    errorCallBack = false;
                    return;
                }

                if($(this).prop('checked') == true) {
                    updatePolicyMethod($(this), 1);
                } else if($(this).prop('checked') == false) {
                    updatePolicyMethod($(this), 0);
                }

            });

            function updatePolicyMethod(method, authorized) {
                var data = {};
                data._token = '{{ csrf_token() }}';
                data.method = method.val();
                data.authorized = authorized;
                $.ajax({
                    url : '{{ route('role.update.permission', ['role' => $role->id]) }}',
                    method : 'PATCH',
                    data:data,
                    success: function () {
                        showSuccess();
                    },
                    error: function () {
                        errorCallBack = true;
                    }
                });
            }

            function showSuccess() {
                toastr.success('Permission updated!')
            }

            var description = $('.description');
            description.editable({
                validate: function(value) {
                    if($.trim(value) == '') return 'This title is required.';
                },
                type: 'text',
                url: description.data('url'),
                pk: description.data('pk'),
                title: 'Edit Title',
                params: function(params) {
                    var data = {};
                    data._token = '{{ csrf_token() }}';
                    data.pk = params.pk;
                    data.field = params.name;
                    data.value = params.value;
                    return data;
                },
                ajaxOptions: {
                    dataType: 'json'
                },
                success: function(response, newValue) {

                }
            });

            var briefingDescription = $('.briefing-description');
            briefingDescription.editable({
                validate: function(value) {
                    if($.trim(value) == '') return 'This description is required.';
                },
                type: 'text',
                url: briefingDescription.data('url'),
                pk: briefingDescription.data('pk'),
                title: 'Edit Description',
                params: function(params) {
                    var data = {};
                    data._token = '{{ csrf_token() }}';
                    data.pk = params.pk;
                    data.field = params.name;
                    data.value = params.value;
                    return data;
                },
                ajaxOptions: {
                    dataType: 'json'
                },
                success: function(response, newValue) {

                }
            });

            var authPolicyMethod = $('.auth-policy-method');
            var moduleDescription = $('.module-description');

            $('.checkbox')
                .checkbox({
                    onChecked: function() {
                        var authModulePolicyMethod = $(this).data('module');
                        updateCheckAll(1, authModulePolicyMethod );
                        authModulePolicyMethod = authModulePolicyMethod ? authModulePolicyMethod : 'auth-policy-method';
                        authModulePolicyMethod = '.' + authModulePolicyMethod;
                        $(authModulePolicyMethod).prop('checked', true);
                    },
                    onUnchecked: function() {
                        var authModulePolicyMethod = $(this).data('module');
                        updateCheckAll(0, authModulePolicyMethod );
                        authModulePolicyMethod = authModulePolicyMethod ? authModulePolicyMethod : 'auth-policy-method';
                        authModulePolicyMethod = '.' + authModulePolicyMethod;
                        $(authModulePolicyMethod).prop('checked', false);
                    }
                });

            // enable-edit
            $('.enable-edit')
                .checkbox({
                    onChecked: function() {
                        briefingDescription.removeClass('hidden');
                        description.removeClass('hidden');
                        moduleDescription.addClass('hidden');
                    },
                    onUnchecked: function() {
                        briefingDescription.addClass('hidden');
                        description.addClass('hidden');
                        moduleDescription.removeClass('hidden');
                    }
                });

            function updateCheckAll(authorized, module) {
                var data = {};
                data.authorized = authorized;
                data.module = module;
                data._token = '{{ csrf_token() }}';
                $.ajax({
                    url : '{{ route('role.update.all.permission', ['role' => $role->id]) }}',
                    method : 'PATCH',
                    data: data,
                    success: function () {
                        showSuccess();
                    },
                    error: function () {
                        errorCallBack = true;
                    }
                });
            }

            moduleDescription.popup();
            $('.index').popup();
            $('.create').popup();
            $('.edit').popup();
            $('.show').popup();
            $('.delete').popup();
            $('.import').popup();
            $('.export').popup();
            $('.auditlog').popup();
            $('.report').popup();
            $('.printLetter').popup();
            $('.history').popup();

            @if($role->name == 'Super Admin')
                authPolicyMethod.prop('checked', true);
                authPolicyMethod.prop('disabled', 'disabled');
            @endif
        });
    </script>
@endsection
