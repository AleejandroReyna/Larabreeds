<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Ds\Set;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new Set();
        $breeds = [];
        $this->command->info('Get Available Breeds with Dog Ceo API: (https://dog.ceo/api/breeds/list/all).');
        $request = Http::get('https://dog.ceo/api/breeds/list/all');
        if($request->ok()) {
            $this->command->info("Get Breeds finished!");
            $response = $request->json();
            $breeds = $response['message'];
        
            $this->command->info("Filtering categories...");
            foreach($breeds as $breed => $content) {
                if($content) {
                    foreach($content as $item) {
                        $categories->add($item);
                    }
                }
            }
            foreach($categories as $category) {
                DB::table('categories')->insert([
                    'name' => $category
                ]);
                $this->command->info("Category ${category} added..");
            }
        }
    }
}
