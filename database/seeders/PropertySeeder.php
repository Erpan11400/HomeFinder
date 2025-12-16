<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $photo = collect([
    // === ORIGINAL (AMAN) ===
    'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1598228723793-52759bba239c?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1572120360610-d971b9d7767c?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=900&q=80',
    'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=900&q=80'
    

]);



        for ($i=0; $i < 10; $i++) { 
            DB::table('properties')->insert([
                'property_id' => 'PP' . $i + 1,
                'photo' => $photo->random(),
                'owner_name' => $faker->name,
                'price' => $faker->numberBetween(800000000,2000000000),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'country' => 'Indonesia',
                'bed_room' => $faker->numberBetween(1,3),
                'bath_room' => $faker->numberBetween(1,3),
                'summary' => $faker->words(20, true),
                'area_l' => $faker->numberBetween(30,100),
                'area_w' => $faker->numberBetween(30,100),
                'review' => $faker->numberBetween(1,10),
                'user_id' => null,
            ]);
        }
    }
}
