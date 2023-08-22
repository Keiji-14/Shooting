<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateDatabase extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */

    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('user_name', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('password', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('current_coin', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();


        $table = $this->table('weapons');
        $table->addColumn('weapon_name', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('weapon_type', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('weapon_damage', 'float',[
            'null' => true,            
        ]);
        $table->addColumn('weapon_speed', 'float',[
            'null' => true,            
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();


        $table = $this->table('skins');
        $table->addColumn('skin_name', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('address', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();



        $table = $this->table('gachas');
        $table->addColumn('gacha_name', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('gacha_type', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('gacha_count', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('consume_coin', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();



        $table = $this->table('stages');
        $table->addColumn('stage_level', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('stage_level_level', 'integer',[
            'null' => true,            
        ]);
        $table->addColumn('address', 'string',[
            'null' => true,            
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();



        $table = $this->table('play_logs');
        $table->addColumn('user_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('weapon_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('skin_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('stage_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('score_type', 'integer',[
            'null' => true,           
        ]);
        $table->addColumn('score', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('play_result', 'boolean',[
            'null' => true,           
        ]);
        $table->addColumn('coin_result', 'integer',[
            'null' => true,           
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();



        $table = $this->table('gacha_rates');
        $table->addColumn('skin_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('weapon_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('gacha_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('gacha_rate', 'float',[
            'null' => true,           
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]); 
        $table->create();



        $table = $this->table('gacha_logs');
        $table->addColumn('gacha_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('user_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('weapon_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('skin_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]);
        $table->create();


        $table = $this->table('weapon_infors');
        $table->addColumn('user_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('weapon_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('gacha_log_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]); 
        $table->create();



        $table = $this->table('skin_infors');
        $table->addColumn('user_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('skin_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('gacha_log_id', 'string',[
            'null' => true,           
        ]);
        $table->addColumn('update_date', 'datetime',[
            'null' => true,           
        ]);
        $table->addColumn('create_date', 'datetime',[
            'null' => true,            
        ]); 
        $table->create();
    }
}
