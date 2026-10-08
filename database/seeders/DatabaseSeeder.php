<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador Oliva',
            'email' => 'admin@oliva.test',
        ]);

        $categories = collect([
            ['name' => 'Cuidado personal', 'description' => 'Aceites, jabones y kits naturales.', 'sort_order' => 1],
            ['name' => 'Despensa premium', 'description' => 'Selecciones gourmet para cocina diaria.', 'sort_order' => 2],
            ['name' => 'Hogar consciente', 'description' => 'Aromas y accesorios para espacios calidos.', 'sort_order' => 3],
        ])->mapWithKeys(function (array $category) {
            $model = Category::create([
                ...$category,
                'slug' => Str::slug($category['name']),
                'is_active' => true,
            ]);

            return [$model->slug => $model];
        });

        $products = [
            [
                'category' => 'cuidado-personal',
                'name' => 'Kit Oliva esencial',
                'sku' => 'OLV-KIT-001',
                'summary' => 'Rutina diaria con aceite corporal, jabon artesanal y crema ligera.',
                'price' => 8900,
                'featured' => true,
                'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'category' => 'despensa-premium',
                'name' => 'Aceite extra virgen',
                'sku' => 'OLV-OIL-001',
                'summary' => 'Botella premium para cocina saludable, regalos corporativos y despensa gourmet.',
                'price' => 4200,
                'featured' => true,
                'image' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'category' => 'hogar-consciente',
                'name' => 'Vela aromatica Oliva',
                'sku' => 'OLV-HOM-001',
                'summary' => 'Aroma suave para espacios calidos, con envase reutilizable.',
                'price' => 5500,
                'featured' => false,
                'image' => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?auto=format&fit=crop&w=900&q=80',
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'category_id' => $categories[$productData['category']]->id,
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'sku' => $productData['sku'],
                'summary' => $productData['summary'],
                'description' => $productData['summary'],
                'base_price_cents' => $productData['price'],
                'currency' => 'PEN',
                'is_featured' => $productData['featured'],
                'is_active' => true,
                'published_at' => now(),
            ]);

            $variant = $product->variants()->create([
                'name' => 'Unico',
                'sku' => $productData['sku'].'-STD',
                'price_cents' => $productData['price'],
                'stock_on_hand' => 25,
                'stock_reserved' => 0,
            ]);

            $product->images()->create([
                'path' => $productData['image'],
                'alt_text' => $productData['name'],
                'is_primary' => true,
            ]);

            $variant->inventoryMovements()->create([
                'type' => 'adjustment',
                'quantity' => 25,
                'stock_after' => 25,
                'notes' => 'Stock inicial de demo.',
            ]);
        }
    }
}
