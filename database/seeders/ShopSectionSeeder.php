<?php

namespace Database\Seeders;

use App\Models\ShopSection;
use Illuminate\Database\Seeder;

class ShopSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = ShopSection::create([
            'title' => 'Популярные модели',
            'order' => 1,
        ]);

        $model_interior = ShopSection::create([
            'title' => 'Интерьер',
            'order' => 2,
        ]);

        $filament = ShopSection::create([
            'title' => 'Пластик',
            'order' => 3,
        ]);
    }
}
