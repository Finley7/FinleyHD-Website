<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserRolesTable Test Case
 */
class UserRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserRolesTable
     */
    public $UserRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_roles',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.permissions_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserRoles') ? [] : ['className' => 'App\Model\Table\UserRolesTable'];
        $this->UserRoles = TableRegistry::get('UserRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserRoles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
