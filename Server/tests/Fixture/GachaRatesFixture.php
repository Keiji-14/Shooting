<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GachaRatesFixture
 */
class GachaRatesFixture extends TestFixture
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
                'skin_id' => 'Lorem ipsum dolor sit amet',
                'weapon_id' => 'Lorem ipsum dolor sit amet',
                'gacha_id' => 'Lorem ipsum dolor sit amet',
                'gacha_rate' => 1,
                'update_date' => '2023-02-20 12:09:41',
                'create_date' => '2023-02-20 12:09:41',
            ],
        ];
        parent::init();
    }
}
