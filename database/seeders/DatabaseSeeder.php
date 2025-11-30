<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $products = [
            [
                'name' => 'Морская соль',
                'description' => 'Крупные кристаллы — плотные, хрустящие, с естественной неровностью формы. Вкус насыщенный, яркий, с выраженной соленостью и тонким намёком на морскую свежесть. ',
                'gradient_from' => '#A4CDFF',
                'gradient_to' => '#499AFF'
            ],
            [
                'name' => 'Красивая баночка',
                'description' => 'Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст. Еще текст.  ',
                'gradient_from' => '#A4CDFF',
                'gradient_to' => '#499AFF'
            ]

        ];
        foreach ($products as $product) {
            $product = Product::create($product);
            $product->addMediaFromUrl(config('app.url') . '/fixed/temp/cover-1.png')->toMediaCollection('cover');
            $product->addMediaFromUrl(config('app.url') . '/fixed/temp/emoji-1.png')->toMediaCollection('emoji');
            for ($i = 1; $i <= 4; $i++) {
                $product->addMediaFromUrl(config('app.url') . "/fixed/temp/prop-{$i}.png")->toMediaCollection('props');
            }
        }
    }
}
