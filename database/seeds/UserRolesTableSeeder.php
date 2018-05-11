<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    protected $models;

    protected $data = [
        1 => 'admin',
        2 => 'device',
    ];

    public function __construct(\App\Models\UserRole $models)
    {
        $this->models = $models;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->models->getTable())->truncate();

        foreach ($this->data as $key => $value) {
            $this->models::create([
                'id' => $key,
                'name' => $value,
            ]);
        }
    }
}
