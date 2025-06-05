<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Track;

class LatestTracks extends Widget
{
    protected static string $view = 'filament.widgets.latest-tracks';

    public function tracks()
    {
        return Track::latest()->take(5)->get();
    }
}
