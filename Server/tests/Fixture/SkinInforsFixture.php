<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkinInforsFixture
 */
class SkinInforsFixture extends TestFixture
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
                'user_id' => 'Lorem ipsum dolor sit amet',
                'skin_id' => 'Lorem ipsum dolor sit amet',
                'gacha_log_id' => 'Lorem ipsum dolor sit amet',
                'update_date' => '2023-02-20 12:09:43',
                'create_date' => '2023-02-20 12:09:43',
            ],
        ];
        parent::init();
    }
}
