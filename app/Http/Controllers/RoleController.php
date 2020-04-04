<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Policy;
use App\PolicyMethod;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Role::class);
        $roles = Role::all();
        return view('role_management.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store', Role::class);
        Role::create($request->only(['name', 'description']));
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('show', Role::class);
        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit', Role::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('edit', Role::class);
        $role->update($request->only(['name', 'description']));
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy', Role::class);
    }
    public function assign_permission(Role $role)
    {
        $this->authorize('edit', Role::class);
        $policies = Policy::with('policyMethods')->get();
        return view('role_management.assign_permission', compact('policies', 'role'));
    }

    public function update_permission(Role $role)
    {
        $this->authorize('edit', Role::class);
        $method = request()->input('method');
        $authorized = request()->input('authorized') ? 1 : 0;
        $policyMethod = $role->policyMethods()->wherePivot('policy_method_id', $method)->first();
        if($policyMethod) {
            $policyMethod->roles()->updateExistingPivot($role->id, ['authorized' => $authorized]);
        }

        $oldPolicyMethod = $role->policyMethods()->find($method);
        $oldAuthorized = $oldPolicyMethod ?  $oldPolicyMethod->pivot_authorized : 0;

        $role->policyMethods()->sync([$method => ['authorized' => $authorized]], false);


    }

    public function export()
    {
        $this->authorize(new Role());
        Excel::create('Role_Report', function($excel) {
            $data = Role::get();
            if(count($data)) {
                $excel->sheet('Role_Report', function($sheet) use ($data) {
                    $sheet->fromArray($data);
                    $sheet->setOrientation('landscape');
                });
            }

        })->export('xls');

        return redirect()->route('role.index');
    }

}
