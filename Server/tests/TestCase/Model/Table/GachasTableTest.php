<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GachasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GachasTable Test Case
 */
class GachasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GachasTable
     */
    protected $Gachas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Gachas',
        'app.GachaLogs',
        'app.GachaRates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gachas') ? [] : ['className' => GachasTable::class];
        $this->Gachas = $this->getTableLocator()->get('Gachas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Gachas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GachasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
