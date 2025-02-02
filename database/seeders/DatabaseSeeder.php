<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class
        ]);
        User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Mr Admin',
            'email' => 'demo@qtecsolution.net',
            'type' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('plans')->insert([
            [
                'user_id' =>  $user->id,
                'name' => 'Free trial',
                'word_count' => 1000,
                'max_words' => 200,
                'document_count' => 10,
                'image_count' => 3,
                'support_enabled' => 0,
                'code_generate_enabled' => 0,
                'chat_enabled' => 1,
                'is_published' => 1,
                'price' => 0.00,
                'yearly_price' => 0.00,
                'templates' => 1,
                'created_at' => Carbon::parse('2023-04-08 09:24:30'),
                'updated_at' => Carbon::parse('2023-10-21 19:38:44'),
            ],
            [
                'user_id' =>  $user->id,
                'name' => 'Basic',
                'word_count' => 10000,
                'max_words' => 600,
                'document_count' => 150,
                'image_count' => 20,
                'support_enabled' => 0,
                'code_generate_enabled' => 1,
                'chat_enabled' => 1,
                'is_published' => 1,
                'price' => 2.00,
                'yearly_price' => 20.00,
                'templates' => 0,
                'created_at' => Carbon::parse('2023-04-08 09:24:53'),
                'updated_at' => Carbon::parse('2023-11-20 19:28:09'),
            ],
            [
                'user_id' =>  $user->id,
                'name' => 'Gold',
                'word_count' => 40000,
                'max_words' => 1000,
                'document_count' => 300,
                'image_count' => 40,
                'support_enabled' => 1,
                'code_generate_enabled' => 1,
                'chat_enabled' => 1,
                'is_published' => 1,
                'price' => 5.00,
                'yearly_price' => 50.00,
                'templates' => 0,
                'created_at' => Carbon::parse('2023-04-27 18:13:29'),
                'updated_at' => Carbon::parse('2023-10-21 07:31:45'),
            ],
            [
                'user_id' =>  $user->id,
                'name' => 'Professional',
                'word_count' => 90000,
                'max_words' => 2000,
                'document_count' => 0,
                'image_count' => 80,
                'support_enabled' => 1,
                'code_generate_enabled' => 1,
                'chat_enabled' => 1,
                'is_published' => 1,
                'price' => 10.00,
                'yearly_price' => 100.00,
                'templates' => 0,
                'created_at' => Carbon::parse('2023-10-20 17:15:22'),
                'updated_at' => Carbon::parse('2023-10-21 07:30:45'),
            ],
            [
                'user_id' =>  $user->id,
                'name' => 'Special Offer Plan',
                'word_count' => 9000,
                'max_words' => 400,
                'document_count' => 0,
                'image_count' => 0,
                'support_enabled' => 0,
                'code_generate_enabled' => 0,
                'chat_enabled' => 0,
                'is_published' => 1,
                'price' => 1.00,
                'yearly_price' => 10.00,
                'templates' => 0,
                'created_at' => Carbon::parse('2023-11-20 19:31:18'),
                'updated_at' => Carbon::parse('2023-11-29 16:34:54'),
            ],
        ]);
    }
}
