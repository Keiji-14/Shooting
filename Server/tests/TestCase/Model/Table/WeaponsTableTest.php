<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeaponsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeaponsTable Test Case
 */
class WeaponsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WeaponsTable
     */
    protected $Weapons;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Weapons',
        'app.GachaLogs',
        'app.GachaRates',
        'app.PlayLogs',
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
        $config = $this->getTableLocator()->exists('Weapons') ? [] : ['className' => WeaponsTable::class];
        $this->Weapons = $this->getTableLocator()->get('Weapons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Weapons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WeaponsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
