<?php
namespace App\Policies;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class UserPolicy extends Policy
{
    protected $methods = ['index', 'create', 'edit', 'delete', 'auditlog', 'report', 'history', 'export'];
    protected $replacedMethods = [
        'update' => 'edit'
    ];
    protected $description = 'User';
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
    public function auditlog()
    {
        return $this->commonCheck;
    }
    public function report()
    {
        return $this->commonCheck;
    }
    public function history()
    {
        return $this->commonCheck;
    }
    public function export()
    {
        return $this->commonCheck;
    }
}
