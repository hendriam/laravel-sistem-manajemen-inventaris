<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::where('name', 'Elektronik')->first();
        $location = Location::where('name', 'Gudang A')->first();
        $user = User::where('name', 'Programmer Lama')->first();

        Inventory::create([
            'code' => 'PRINTER01',
            'name' => 'Printer Laser Jet',
            'category_id' => $category->id,
            'location_id' => $location->id,
            'quantity' => 2,
            'unit' => 'Unit',
            'condition' => 'baik',
            'received_at' => date('Y-m-d H:m:s'),
            'description' => '-',
            'created_by' => $user->id,
        ]);
    }
}
