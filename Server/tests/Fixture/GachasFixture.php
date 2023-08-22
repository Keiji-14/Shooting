<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GachasFixture
 */
class GachasFixture extends TestFixture
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
                'gacha_name' => 'Lorem ipsum dolor sit amet',
                'gacha_type' => 1,
                'gacha_count' => 1,
                'consume_coin' => 1,
                'update_date' => '2023-02-20 12:09:42',
                'create_date' => '2023-02-20 12:09:42',
            ],
        ];
        parent::init();
    }
}
