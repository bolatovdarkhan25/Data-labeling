<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class DashboardControl extends Component
{
    public function render()
    {
        $allUsersCount = User::query()->count();

        $newUsersForWeekCount = User::where('created_at', '>', Carbon::now()->subDays(7))->count();

        $pageName = 'Dashboard';

        return view(
            'livewire.admin.dashboard-control',
            compact('allUsersCount', 'newUsersForWeekCount', 'pageName')
        );
    }
}
