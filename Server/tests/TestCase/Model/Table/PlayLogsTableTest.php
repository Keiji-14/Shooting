<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayLogsTable Test Case
 */
class PlayLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayLogsTable
     */
    protected $PlayLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PlayLogs',
        'app.Users',
        'app.Weapons',
        'app.Skins',
        'app.Stages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PlayLogs') ? [] : ['className' => PlayLogsTable::class];
        $this->PlayLogs = $this->getTableLocator()->get('PlayLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PlayLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PlayLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PlayLogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
