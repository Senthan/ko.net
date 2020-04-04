<?php
namespace App\Policies;
use App\PolicyMethod;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Cache;
use App\Policy as PolicyModel;
class Policy
{
    use HandlesAuthorization;
    protected $methods = ['index', 'create', 'show', 'edit', 'delete', 'import', 'export'];
    protected $replacedMethods = ['store' => 'create', 'update' => 'edit', 'destroy' => 'delete'];
    protected $description;
    protected $policyMethods;
    protected $rolePolicyMethods;
    protected $role;
    protected $policyModel;
    protected $commonCheck;
    public function getMethods()
    {
        return $this->methods;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function before($user, $ability, $model)
    {
        $this->role = $user->findHighestRole();

        if(!$this->role) {
            $this->commonCheck = false;
            return;
        }
        $this->policyModel = PolicyModel::get();

        if (!($this->role instanceof Role)) {
            return false;
        }
        $this->rolePolicyMethods = $this->role->policyMethods()->get();

        $this->policyMethods = PolicyMethod::get();

        if($this->role->name == 'Super Admin') {
            return true;
        }

        $policyClassName = class_basename(policy($model));
        $policy = $this->policyModel->where('name', $policyClassName)->first();
        $currentMethod = $ability;
        if (array_key_exists($currentMethod, $this->replacedMethods)) {
            $currentMethod = $this->replacedMethods[$currentMethod];
        }
        if ($policy) {
            $policyMethod = $this->policyMethods->where('policy_id', $policy->id)->where('name', $currentMethod)->first();
        } else {
            $policyMethod = false;
        }
        $this->commonCheck = false;

        if($policyMethod) {
            $rolePolicyMethod = $this->rolePolicyMethods->find($policyMethod->id);
            if($rolePolicyMethod && $rolePolicyMethod->pivot) {
                $this->commonCheck = $rolePolicyMethod->pivot->authorized == 1 ? true : false;
            }
        }
    }

}
