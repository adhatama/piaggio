<?php

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricing::truncate();

        Pricing::create(['hour'=>12, 'price'=>100000, 'type'=>'halfDay']);
        Pricing::create(['hour'=>24, 'price'=>130000, 'type'=>'fullDay']);
        Pricing::create(['hour'=>36, 'price'=>208000, 'type'=>'additional1']);
        Pricing::create(['hour'=>48, 'price'=>312000, 'type'=>'additional2']);
        Pricing::create(['hour'=>60, 'price'=>416000, 'type'=>'additional3']);
        Pricing::create(['hour'=>72, 'price'=>520000, 'type'=>'additional4']);
        Pricing::create(['hour'=>84, 'price'=>624000, 'type'=>'additional5']);
        Pricing::create(['hour'=>96, 'price'=>682500, 'type'=>'weekly']);
        Pricing::create(['hour'=>720, 'price'=>2730000, 'type'=>'monthly']);
    }
}
