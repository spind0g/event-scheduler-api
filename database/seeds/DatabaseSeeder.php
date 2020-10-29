<?php

use App\SelectedDay;
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
        factory('App\Event', 10)->create()->each(function ($event) {
            $rand = rand(1, 7);

            for($i = 1; $i <= $rand; $i ++)
            {
                SelectedDay::create(['event_id' => $event->id, 'value' => $i]);
            }
        });
    }
}
