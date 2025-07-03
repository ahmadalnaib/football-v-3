<?php

namespace App\Observers;

use App\Models\League;

class LeagueObserver
{
    public function updating(League $league)
    {
        if (in_array('default', array_keys($league->getDirty()))) {
            League::where('id', '!=', $league->id)->update(['default' => false]);
        }
}
}
