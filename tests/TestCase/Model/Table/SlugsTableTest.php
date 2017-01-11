<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlugsTable Test Case
 */
class SlugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SlugsTable
     */
    public $Slugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.slugs',
        'app.pages',
        'app.authors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Slugs') ? [] : ['className' => 'App\Model\Table\SlugsTable'];
        $this->Slugs = TableRegistry::get('Slugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Slugs);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
