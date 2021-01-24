<?php

namespace Database\Seeders;

use App\Models\ShopCategory;
use Illuminate\Database\Seeder;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model_naruto = ShopCategory::create([
            'title'       => 'Наруто',
            'description' => 'Модели персонажей из аниме Наруто',
            'section_id'  => 1,
        ]);

        $model_galaxy_guardians = ShopCategory::create([
            'title'       => 'Стражи Галактики',
            'description' => 'Модели персонажей из кинофильма Защитники Галактики',
            'section_id'  => 1,
        ]);

        $interior_lamp = ShopCategory::create([
            'title'       => 'Светильники',
            'description' => 'Самые разнообразные светильники',
            'section_id'  => 2,
        ]);

        $interior_storage = ShopCategory::create([
            'title'       => 'Хранение',
            'description' => 'Различные хранилища для компактного хранения вещей',
            'section_id'  => 2,
        ]);

        $filament_bestfilament = ShopCategory::create([
            'title'       => 'Bestfilament',
            'description' => 'Пластик от Bestfilament',
            'section_id'  => 3,
        ]);
    }
}
