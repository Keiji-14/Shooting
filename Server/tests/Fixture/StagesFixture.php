<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StagesFixture
 */
class StagesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'stage_level' => 1,
                'stage_level_level' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'update_date' => '2023-02-20 12:09:44',
                'create_date' => '2023-02-20 12:09:44',
            ],
        ];
        parent::init();
    }
}
