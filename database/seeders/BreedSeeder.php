<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Get Breeds with Dog Ceo API: (https://dog.ceo/api/breeds/list/all).');
        $request = Http::get('https://dog.ceo/api/breeds/list/all');
        if($request->ok()) {
            $this->command->info("Get Breeds finished!");
            $response = $request->json();
            $message = $response['message'];
            foreach($message as $breed => $content) {
                $image = 'https://place-hold.it/300x500';
                $uri = "https://dog.ceo/api/breed/{$breed}/images/random";
                $this->command->info("Get Image for ${breed}: (${uri})");
                $image_request = Http::get($uri);
                if($request->ok()) {
                    $image_response = $image_request->json();
                    $image = $image_response['message'];
                    $this->command->info("Image for ${breed} getted.");
                } else {
                    $this->command->error("Image for ${breed} not found.");
                }
                DB::table('breeds')->insert([
                    'name' => $breed,
                    'thumbnail' => $image
                ]);
                $this->command->info("Breed: ${breed} added!");
            }
        } else {
            $this->command->error("Get breeds has error!");
        }
    }
}
