<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title' => 'Informasi', 'slug' => 'informasi'],
        	['title' => 'Pengumuman', 'slug' => 'pengumuman'],
        	['title' => 'Pemerintah', 'slug' => 'pemerintah']
        ];

        foreach($data as $row) {
        	Category::create($row);
        }
    }
}
