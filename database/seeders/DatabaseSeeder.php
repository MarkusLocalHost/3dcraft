<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;

use App\Models\ShopProduct;
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
//        \App\Models\User::factory(10)->create();
//        BlogTag::factory(5)->create();
//        BlogCategory::factory(5)->create();
//        BlogPost::factory(10)->create();
//        $this->call(ShopSectionSeeder::class);
//        $this->call(ShopCategorySeeder::class);
        ShopProduct::factory(50)->create();
    }
}
