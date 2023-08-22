<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GachaLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GachaLogsTable Test Case
 */
class GachaLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GachaLogsTable
     */
    protected $GachaLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.GachaLogs',
        'app.Gachas',
        'app.Users',
        'app.Weapons',
        'app.Skins',
        'app.SkinInfors',
        'app.WeaponInfors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('GachaLogs') ? [] : ['className' => GachaLogsTable::class];
        $this->GachaLogs = $this->getTableLocator()->get('GachaLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->GachaLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GachaLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GachaLogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
