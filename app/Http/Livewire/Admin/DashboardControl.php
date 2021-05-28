<?php

namespace App\Http\Livewire\Admin;

use App\Models\LabeledAuthor;
use App\Models\LabeledSound;
use App\Models\LabeledText;
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

        $annotatedFilesCount = LabeledSound::count() + LabeledAuthor::count() + LabeledText::count();

        $january = LabeledSound::where('created_at', '>=', Carbon::make('2021-01-01'))
            ->where('created_at', '<', Carbon::make('2021-02-01'))
            ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-01-01'))
                ->where('created_at', '<', Carbon::make('2021-02-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-01-01'))
                ->where('created_at', '<', Carbon::make('2021-02-01'))
                ->count();

        $february = LabeledSound::where('created_at', '>=', Carbon::make('2021-02-01'))
                ->where('created_at', '<', Carbon::make('2021-03-01'))
                ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-02-01'))
                ->where('created_at', '<', Carbon::make('2021-03-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-02-01'))
                ->where('created_at', '<', Carbon::make('2021-03-01'))
                ->count();

        $march = LabeledSound::where('created_at', '>=', Carbon::make('2021-03-01'))
                ->where('created_at', '<', Carbon::make('2021-04-01'))
                ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-03-01'))
                ->where('created_at', '<', Carbon::make('2021-04-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-03-01'))
                ->where('created_at', '<', Carbon::make('2021-04-01'))
                ->count();

        $april = LabeledSound::where('created_at', '>=', Carbon::make('2021-04-01'))
                ->where('created_at', '<', Carbon::make('2021-05-01'))
                ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-04-01'))
                ->where('created_at', '<', Carbon::make('2021-05-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-04-01'))
                ->where('created_at', '<', Carbon::make('2021-05-01'))
                ->count();

        $may = LabeledSound::where('created_at', '>=', Carbon::make('2021-05-01'))
                ->where('created_at', '<', Carbon::make('2021-06-01'))
                ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-05-01'))
                ->where('created_at', '<', Carbon::make('2021-06-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-05-01'))
                ->where('created_at', '<', Carbon::make('2021-06-01'))
                ->count();

        $june = LabeledSound::where('created_at', '>=', Carbon::make('2021-06-01'))
                ->where('created_at', '<', Carbon::make('2021-07-01'))
                ->count() +
            LabeledAuthor::where('created_at', '>=', Carbon::make('2021-06-01'))
                ->where('created_at', '<', Carbon::make('2021-07-01'))
                ->count() +
            LabeledText::where('created_at', '>=', Carbon::make('2021-06-01'))
                ->where('created_at', '<', Carbon::make('2021-07-01'))
                ->count();

        $chartData = json_encode([$january, $february, $march, $april, $may, $june]);

        return view(
            'livewire.admin.dashboard-control',
            compact('allUsersCount', 'newUsersForWeekCount', 'annotatedFilesCount', 'chartData', 'pageName')
        );
    }
}
