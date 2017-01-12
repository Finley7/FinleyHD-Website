<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int $primary_role
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\UserRole[] $user_roles
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];


    /**
     * @param string $permissionName Permission name
     *
     * @return bool
     */
    public function hasPermission($permissionName)
    {
        return in_array($permissionName, $this->_getPermissions());
    }

    /**
     * @return array
     */
    public function _getPermissions()
    {
        $_permissions = [];
        foreach ($this->_getRoles() as $role) {
            foreach ($role->permissions as $permission) {
                $_permissions[] = $permission->name;
            }
        }
        return array_unique($_permissions);
    }

    /**
     * @return array
     */
    private function _getRoles()
    {
        $permissionsRegistry = TableRegistry::get('UserRoles');
        $userRoles = $permissionsRegistry->findByUserId($this->id)->contain(['Roles' => ['Permissions']]);
        $roles = [];
        foreach ($userRoles as $userRole) {
            $roles[] = $userRole->role;
        }
        return $roles;
    }

    /**
     * @param string $password Given password
     *
     * @return mixed
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
