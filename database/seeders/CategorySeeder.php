<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Main categories
        $necklaces = Category::create(['name' => 'Necklaces']);
        $earrings = Category::create(['name' => 'Earrings']);
        
        // Subcategories under 'Necklaces'
        $goldNecklaces = Category::create([
            'name' => 'Gold Necklaces',
            'parent_id' => $necklaces->id
        ]);
        $diamondNecklaces = Category::create([
            'name' => 'Diamond Necklaces',
            'parent_id' => $necklaces->id
        ]);
        
        // Subcategories under 'Earrings'
        $goldEarrings = Category::create([
            'name' => 'Gold Earrings',
            'parent_id' => $earrings->id
        ]);
        $diamondEarrings = Category::create([
            'name' => 'Diamond Earrings',
            'parent_id' => $earrings->id
        ]);
    }
}
