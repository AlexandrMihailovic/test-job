<?php

namespace Database\Seeders;

use App\Models\Cv;
use Illuminate\Database\Seeder;

class CvTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cv::factory()->count(50)->create();
    }
}
