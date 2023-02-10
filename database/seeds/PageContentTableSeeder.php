<?php

use Illuminate\Database\Seeder;

class PageContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PageContent::class, 4)->create();
    }
}
