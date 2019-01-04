<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
    		[
            'title' => 'Colosseum',
            'name' => 'colosseum-like.jpg',
        	],
        	[
            'title' => 'Machu Picchu',
            'name' => 'Machu Picchu-like.jpg',
        	],
        	[
            'title' => 'Great Wall of China',
            'name' => 'great-wall-of-china-like.jpg',
        	],
        	[
            'title' => 'The Eiffel Tower',
            'name' => 'Eiffel-Tower-like.jpg',
        	],
        	[
            'title' => 'Petra',
            'name' => 'petra-like.jpg',
        	],
        	[
            'title' => 'Taj Mahal',
            'name' => 'taj-mahal-like.jpg',
        	]
    	];
        DB::table('images')->insert($images);
    }
}
