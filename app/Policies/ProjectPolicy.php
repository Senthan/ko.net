<?php

namespace App\Policies;

use App\User;

class ProjectPolicy extends Policy
{
    protected $encrypted = [];

    protected $methods = ['index', 'create', 'edit', 'show', 'delete'];

    protected $replacedMethods = ['view' => 'show', 'store' => 'create', 'update' => 'edit', 'destroy' => 'delete'];

    public function index()
    {
        return $this->commonCheck;
    }

    public function create()
    {
        return $this->commonCheck;
    }

    public function store()
    {
        return $this->create();
    }

    public function edit(User $user, $model)
    {
         return $this->commonCheck;
    }

    public function update(User $user, $model)
    {
        return $this->edit($user, $model);
    }

    public function view(User $user, $model)
    {
        return $this->show($user, $model);
    }

    public function show(User $user, $model)
    {
         return $this->commonCheck;
    }

    public function delete(User $user, $model)
    {
         return $this->commonCheck;
    }

    public function destroy(User $user, $model)
    {
        return $this->delete($user, $model);
    }

}
