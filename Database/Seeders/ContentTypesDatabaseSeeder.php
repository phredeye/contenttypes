<?php

namespace Modules\ContentTypes\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContentTypesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContentTypeTableSeeder::class);
        $this->call(ContentNodeTableSeeder::class);
    }
}
