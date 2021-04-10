<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Breed;
use App\Models\Category;
use App\Models\SubBreed;

class SubBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breeds = [];
        $this->command->info('Get Available Breeds with Dog Ceo API: (https://dog.ceo/api/breeds/list/all).');
        $request = Http::get('https://dog.ceo/api/breeds/list/all');
        if($request->ok()) {
            $this->command->info("Get Breeds finished!");
            $response = $request->json();
            $breeds = $response['message'];
            foreach ($breeds as $_breed => $assocs) {
                if($assocs) {
                    $breed = Breed::where('name', $_breed)->first();
                    $this->command->info("The breed " . $breed->name . " has sub breeds...");
                    foreach ($assocs as $assoc) {
                        $category = Category::where('name', $assoc)->first();
                        $this->command->info("Setting sub breed ". $category->name . " to " . $breed->name . "...");
                        $this->command->info("Sub breed ". $category->name . " founded.");
                        $image = 'https://place-hold.it/300x500';
                        $uri = "https://dog.ceo/api/breed/". $breed->name ."/". $category->name ."/images/random";
                        $this->command->info("Fetching image: (${uri})");
                        $image_request = Http::get($uri);
                        if($image_request->ok()) {
                            $image_response = $image_request->json();
                            $image = $image_response['message'];
                            $this->command->info("Image fetched: (${image})");
                        } else {
                            $this->command->error("Image not fetched, use the default image: (${image})");
                        }
                        $this->command->info("Creating sub breed " . $category->name . " to " . $breed->name . ".");
                        $new_subbreed = SubBreed::create([
                            'breed_id' => $breed->id,
                            'category_id' => $category->id,
                            'thumbnail' => $image
                        ]);
                        $this->command->info("Sub breed " . $category->name . " for " . $breed->name . " created.");
                    }
                }
            }
        } else {
            $this->command->error("Error with fetching breeds, try again later");
        }
    }
}

# php artisan db:seed --class=SubBreedSeeder