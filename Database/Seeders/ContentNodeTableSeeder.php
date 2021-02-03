<?php

namespace Modules\ContentTypes\Database\Seeders;

use App\Contracts\SeedsFakeData;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ContentTypes\Models\ContentNode;
use Modules\ContentTypes\Models\ContentType;

class ContentNodeTableSeeder extends Seeder implements SeedsFakeData
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->generateDefaults();
    }

    /**
     * @todo do what wordpress does - generate a sample page and a hello world blog post
     */
    public function generateDefaults() : void {

    }

    public function generateFakeData() : void {
        ContentNode::factory(30)->make()->each(function(ContentNode $node) {
            $user = User::inRandomOrder()->first();
            $type = ContentType::inRandomOrder()->first();

            $node->type()->associate($type);
            $node->createdBy()->associate($user);

            $node->save();
        });
    }
}
