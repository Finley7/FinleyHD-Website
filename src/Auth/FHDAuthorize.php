<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;

/**
 * Class FHDAuthorize
 * @package App\Auth
 */
class FHDAuthorize extends BaseAuthorize
{
    /**
     * @param array|\ArrayAccess $user User Array
     * @param Request $request CakePHP Request
     *
     * @return bool
     */
    public function authorize($user, Request $request)
    {
        $permissionName = strtolower((isset($request->prefix) ? strtolower($request->prefix) . "_" : null ) . strtolower($request->controller) . "_" . $request->action);

        if ($this->_isAllowed($user, $permissionName) == true) {
            return true;
        }

        return false;
    }

    /**
     * @param array $user Current user array
     * @param string $permissionName Permission name
     *
     * @return bool
     */
    protected function _isAllowed($user, $permissionName)
    {
        $userPermissions = [];
        $userRegistry = TableRegistry::get('Users');
        $userQuery = $userRegistry->findById($user['id'])->contain([
            'Roles' => [
                'Permissions'
            ]
        ]);

        $userObject = $userQuery->first();

        foreach ($userObject->roles as $role) {
            foreach ($role->permissions as $permission) {
                $userPermissions[] = $permission->name;
            }
        }

        array_unique($userPermissions);

        if (in_array($permissionName, $userPermissions) == true) {
            return true;
        }

        return false;
    }
}
