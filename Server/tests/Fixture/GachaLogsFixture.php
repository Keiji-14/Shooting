<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GachaLogsFixture
 */
class GachaLogsFixture extends TestFixture
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
                'gacha_id' => 'Lorem ipsum dolor sit amet',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'weapon_id' => 'Lorem ipsum dolor sit amet',
                'skin_id' => 'Lorem ipsum dolor sit amet',
                'update_date' => '2023-02-20 12:09:38',
                'create_date' => '2023-02-20 12:09:38',
            ],
        ];
        parent::init();
    }
}
