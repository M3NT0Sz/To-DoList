<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria tags
        $tags = \App\Models\Tag::factory(5)->create();

        // Cria tarefas para cada usuário, associando tags aleatórias
        \App\Models\User::all()->each(function($user) use ($tags) {
            $tasks = \App\Models\Task::factory(100)->create(['user_id' => '1']);
            foreach ($tasks as $task) {
                $task->tags()->sync($tags->random(rand(1, 3))->pluck('id')->toArray());
            }
        });
    }
}
