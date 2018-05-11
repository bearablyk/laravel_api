<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        foreach($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->call(UserRolesTableSeeder::class);
        $this->call(StoryCatogoriesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\UserRole::findOrFail(\App\Models\UserRole::ADMIN)->users()->create([
            'email' => 'admin',
            'password' => bcrypt('qwerqwer')
        ]);

        Artisan::call('passport:install');
    }
}
