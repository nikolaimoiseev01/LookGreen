<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::firstOrCreate([
            'name' => 'Admin Name',
            'email' => config('app.admin.email'),
            'email_verified_at' => now(),
            'password' => Hash::make(config('app.admin.password'))
        ]);

        $products = [
            [
                'name' => 'Морская соль',
                'props_color' => '#2969b7',
                'description' => 'Крупные кристаллы — плотные, хрустящие, с естественной неровностью формы. Вкус насыщенный, яркий, с выраженной соленостью и тонким намёком на морскую свежесть. ',
                'gradient_from' => '#A4CDFF',
                'gradient_to' => '#499AFF',
                'props' => ['natural', 'mineral', 'micro', 'macro']
            ],
            [
                'name' => 'СЕМЕНА ЧИА',
                'props_color' => '#de42b2',
                'description' => 'Нежный природный аромат с лёгкими ореховыми и зерновыми оттенками. Цвет семян — глубокий серо-чёрный с мерцающими вкраплениями белого.',
                'gradient_from' => '#ff51ce',
                'gradient_to' => '#ffa4e8',
                'props' => ['omega', 'vegan', 'oksi', 'protein']
            ],
            [
                'name' => 'Салатная смесь',
                'props_color' => '#8d9f3e',
                'description' => 'Свежий аромат с травянистыми и ореховыми нотками. Цвет — разноцветная мозаика от тёплого золотистого до насыщенного зелёно-коричневого. ',
                'gradient_from' => '#a4c127',
                'gradient_to' => '#d6eb7a',
                'props' => ['omega', 'vegan', 'uglevod', 'protein']
            ],
            [
                'name' => 'Семена льна',
                'props_color' => '#5f4ed3',
                'description' => 'Тёплый, мягкий аромат с тонкими ореховыми  оттенками. Цвет — золотисто-коричневый, глубокий и естественный. Вкус насыщенный, маслянистый, с лёгкой сладостью и едва уловимой терпкостью. ',
                'gradient_from' => '#9786ee',
                'gradient_to' => '#c2b7ff',
                'props' => ['omega', 'vegan', 'uglevod', 'kletchatka']
            ],
            [
                'name' => 'Псиллиум',
                'props_color' => '#ba5518',
                'description' => 'Нейтральный, почти прозрачный аромат с лёгкой травяной свежестью. Цвет — светло-бежевый, с мягкой матовой текстурой. Вкус тонкий, деликатный, раскрывающийся мягкой зернистостью.',
                'gradient_from' => '#ea9b16',
                'gradient_to' => '#ffc461',
                'props' => ['natural', 'vegan', 'uglevod', 'kletchatka']
            ],
            [
                'name' => 'Матча зеленая',
                'props_color' => '#fe99de',
                'description' => 'Насыщенный благородный аромат с морскими нотками и мягким травянисто-сладковатым оттенком. Вкус плотный, терпковатый, с приятной легкой горчинкой и долгим, цепляющим послевкусием.',
                'gradient_from' => '#ea9b16',
                'gradient_to' => '#55ddb7',
                'props' => ['vegan', 'oksi']
            ]

        ];
        foreach ($products as $product) {
            $newProduct = Product::create([
                'name' => $product['name'],
                'props_color' => $product['props_color'],
                'description' => $product['description'],
                'gradient_from' => $product['gradient_from'],
                'gradient_to' => $product['gradient_to'],
            ]);
            $newProduct->addMediaFromUrl(config('app.url') . "/fixed/temp/cover-{$newProduct['id']}.png")->toMediaCollection('cover');
            $newProduct->addMediaFromUrl(config('app.url') . "/fixed/temp/cover-{$newProduct['id']}-mobile.png")->toMediaCollection('cover_mobile');
            foreach ($product['props'] as $prop) {
                $newProduct->addMediaFromUrl(config('app.url') . "/fixed/temp/props-{$prop}.png")->toMediaCollection('props');
            }
        }
    }
}
