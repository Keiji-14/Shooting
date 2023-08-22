<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayLogsFixture
 */
class PlayLogsFixture extends TestFixture
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
                'weapon_id' => 'Lorem ipsum dolor sit amet',
                'skin_id' => 'Lorem ipsum dolor sit amet',
                'stage_id' => 'Lorem ipsum dolor sit amet',
                'score_type' => 1,
                'score' => 'Lorem ipsum dolor sit amet',
                'play_result' => 1,
                'coin_result' => 1,
                'update_date' => '2023-02-20 12:09:42',
                'create_date' => '2023-02-20 12:09:42',
            ],
        ];
        parent::init();
    }
}
