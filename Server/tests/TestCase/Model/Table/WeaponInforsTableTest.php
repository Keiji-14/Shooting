<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeaponInforsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeaponInforsTable Test Case
 */
class WeaponInforsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WeaponInforsTable
     */
    protected $WeaponInfors;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.WeaponInfors',
        'app.Users',
        'app.Weapons',
        'app.GachaLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WeaponInfors') ? [] : ['className' => WeaponInforsTable::class];
        $this->WeaponInfors = $this->getTableLocator()->get('WeaponInfors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WeaponInfors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WeaponInforsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\WeaponInforsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
