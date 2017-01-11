<?php
use Migrations\AbstractMigration;

class CurrentDb extends AbstractMigration
{
    public function up()
    {

        $this->table('pages')
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 175,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('primary_slug', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('min_role', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('permissions')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('role_permissions', ['id' => false, 'primary_key' => ['permission_id', 'role_id']])
            ->addColumn('permission_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'permission_id',
                ]
            )
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();

        $this->table('roles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('banned', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('slugs', ['id' => false, 'primary_key' => ['']])
            ->addColumn('page_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'page_id',
                ]
            )
            ->create();

        $this->table('user_roles', ['id' => false, 'primary_key' => ['user_id', 'role_id']])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('primary_role', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'username',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'primary_role',
                ]
            )
            ->create();

        $this->table('role_permissions')
            ->addForeignKey(
                'permission_id',
                'permissions',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('slugs')
            ->addForeignKey(
                'page_id',
                'pages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('user_roles')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'primary_role',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('role_permissions')
            ->dropForeignKey(
                'permission_id'
            )
            ->dropForeignKey(
                'role_id'
            );

        $this->table('slugs')
            ->dropForeignKey(
                'page_id'
            );

        $this->table('user_roles')
            ->dropForeignKey(
                'role_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('users')
            ->dropForeignKey(
                'primary_role'
            );

        $this->dropTable('pages');
        $this->dropTable('permissions');
        $this->dropTable('role_permissions');
        $this->dropTable('roles');
        $this->dropTable('slugs');
        $this->dropTable('user_roles');
        $this->dropTable('users');
    }
}
