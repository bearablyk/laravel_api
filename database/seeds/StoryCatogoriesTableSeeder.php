<?php

use Illuminate\Database\Seeder;

class StoryCatogoriesTableSeeder extends Seeder
{
    protected $models;

    protected $data = [
        1 => 'featured',
        2 => 'trending',
        3 => 'new',
    ];

    public function __construct(\App\Models\StoryCatogory $models)
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
