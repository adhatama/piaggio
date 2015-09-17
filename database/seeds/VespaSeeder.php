<?php

use App\Models\Vespa;
use Illuminate\Database\Seeder;

class VespaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vespa::truncate();

        Vespa::create(['name' => 'Vespa PX123', 'code' => 'px123', 'status' => 0]);
        Vespa::create(['name' => 'Vespa ASDF1234', 'code' => 'asdf1234', 'status' => 0]);
    }
}
