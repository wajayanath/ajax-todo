<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Items')->truncate();

        // generate 4 categories
        DB::table('Items')->insert([
            [
                'item' => "Article",
            ],
            [
                'item' => "Video",
            ],
            [
                'item' => "Podcast",
            ],
            [
                'item' => "Other Media",
            ],
        ]);
    }
}
