<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            ['title' => 'Home', 'slug' => 'landing', 'is_default' => true, 'order_index' => 1],
            ['title' => 'Staff', 'slug' => 'staff', 'is_default' => true, 'order_index' => 2],
            ['title' => 'Announcements', 'slug' => 'announcements', 'is_default' => true, 'order_index' => 3],
        ];

        foreach ($defaults as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
