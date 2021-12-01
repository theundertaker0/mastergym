<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuscleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $muscles = ['Trapecios', 'Deltoides', 'Pectorales', 'Triceps', 'Biceps',
            'Antebrazos', 'Serrato', 'Abdominales', 'Fascia Lata', 'Aductores',
            'Cuadriceps', 'Gemelos', 'Dorsales', 'Oblicuos', 'Lumbares',
            'Glúteos', 'Isquiotibiales'];
        foreach ($muscles as $muscle) {
            DB::table('muscles')->insert(['name'=> $muscle, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        }

    }
}
