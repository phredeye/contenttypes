<?php

namespace Modules\ContentTypes\Database\Seeders;

use App\Contracts\SeedsFakeData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\ContentTypes\Models\ContentType;

class ContentTypeTableSeeder extends Seeder implements SeedsFakeData
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // generate default content types
        ContentType::create(["name" => 'Post']);
        ContentType::create(['name' => 'Page']);
    }

    /**
     * Use factories to generate fake dummy content for ui or other development purposes
     */
    public function generateFakeData(): void
    {
        ContentType::create(['name'=> 'Programming Languages']);
    }
}
