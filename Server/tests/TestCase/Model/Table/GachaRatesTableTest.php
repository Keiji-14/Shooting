<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GachaRatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GachaRatesTable Test Case
 */
class GachaRatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GachaRatesTable
     */
    protected $GachaRates;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.GachaRates',
        'app.Skins',
        'app.Weapons',
        'app.Gachas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('GachaRates') ? [] : ['className' => GachaRatesTable::class];
        $this->GachaRates = $this->getTableLocator()->get('GachaRates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->GachaRates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GachaRatesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GachaRatesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
