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
        $this->call(UsersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(PageContentTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
    }
}
