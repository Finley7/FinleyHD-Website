<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RolePermissions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Permissions
 * @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\RolePermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\RolePermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RolePermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RolePermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RolePermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RolePermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RolePermission findOrCreate($search, callable $callback = null, $options = [])
 */
class RolePermissionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param  array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('role_permissions');
        $this->displayField('permission_id');
        $this->primaryKey(['permission_id', 'role_id']);

        $this->belongsTo(
            'Permissions',
            [
            'foreignKey' => 'permission_id',
            'joinType' => 'INNER'
            ]
        );
        $this->belongsTo(
            'Roles',
            [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
            ]
        );
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param  \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['permission_id'], 'Permissions'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
