<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name'=>'Laptop','price'=>'70000','description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.','imageUrl'=>'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGFwdG9wfGVufDB8fDB8fHww','category'=>'Gadget','brand'=>'ASUS','quantity'=>'30'],

            ['name'=>'Watch','price'=>'30000','description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.','imageUrl'=>'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8V2F0Y2h8ZW58MHx8MHx8fDA%3D','category'=>'Gadget','brand'=>'TITAN','quantity'=>'50'],

            ['name'=>'Iphone','price'=>'100000','description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.','imageUrl'=>'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGFwdG9wfGVufDB8fDB8fHww','category'=>'Gadget','brand'=>'APPLE','quantity'=>'10'],

            ['name'=>'Headphone','price'=>'3000','description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.','imageUrl'=>'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8SGVhZHBob25lfGVufDB8fDB8fHww','category'=>'Gadget','brand'=>'Dolby','quantity'=>'10'],

            ['name'=>'Air Pod','price'=>'100000','description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit.','imageUrl'=>'https://media.istockphoto.com/id/1423100962/photo/wireless-earphones-headphones.webp?b=1&s=170667a&w=0&k=20&c=sMI7yPeCdSNv3hSXhsm7RuaPB6sW7MXGiipEZVT9ijk=','category'=>'Gadget','brand'=>'APPLE','quantity'=>'20'],
        ];

        foreach ($products as $key => $product) {
            Product::updateOrCreate([
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
                'imageUrl' => $product['imageUrl'],
                'brand' => $product['brand'],
                'quantity' => $product['quantity'],
                'category' => $product['category'],
            ]);
        }
    }
}
