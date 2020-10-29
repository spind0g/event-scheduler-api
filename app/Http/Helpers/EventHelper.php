<?php

namespace App\Http\Helpers;

use App\SelectedDay;

class EventHelper
{
    public static function saveSelectedDays($eventId, $selectedDays)
    {
        if(!$eventId || !$selectedDays)
        {
            return;
        }

        foreach($selectedDays as $selectedDay)
        {
            SelectedDay::create([
                'event_id' => $eventId,
                'value' => $selectedDay,
            ]);
        }
    }
}
