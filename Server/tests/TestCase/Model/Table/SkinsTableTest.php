<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkinsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkinsTable Test Case
 */
class SkinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SkinsTable
     */
    protected $Skins;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Skins',
        'app.GachaLogs',
        'app.GachaRates',
        'app.PlayLogs',
        'app.SkinInfors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Skins') ? [] : ['className' => SkinsTable::class];
        $this->Skins = $this->getTableLocator()->get('Skins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Skins);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SkinsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
