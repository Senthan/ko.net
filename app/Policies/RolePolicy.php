<?php
namespace App\Policies;
use App\User;
class RolePolicy extends Policy
{
    protected $methods = ['index', 'create', 'edit', 'delete', 'export', 'show'];
    protected $replacedMethods = [
        'update' => 'edit'
    ];
    protected $description = 'Role';
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
    public function edit()
    {
        return $this->commonCheck;
    }
    public function update()
    {
        return $this->edit();
    }
    public function delete()
    {
        return $this->commonCheck;
    }
    public function export()
    {
        return $this->commonCheck;
    }
    public function show()
    {
        return $this->commonCheck;
    }
}
