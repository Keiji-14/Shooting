<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WeaponsFixture
 */
class WeaponsFixture extends TestFixture
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
                'weapon_name' => 'Lorem ipsum dolor sit amet',
                'weapon_type' => 1,
                'weapon_damage' => 1,
                'weapon_speed' => 1,
                'update_date' => '2023-02-20 12:09:46',
                'create_date' => '2023-02-20 12:09:46',
            ],
        ];
        parent::init();
    }
}
