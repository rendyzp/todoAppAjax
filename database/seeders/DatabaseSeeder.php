<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Task::create([
            'id_task' => 1,
            'title' => 'cek',
            'description' => 'ceksatuduatigaem'
        ]);
    }
}
