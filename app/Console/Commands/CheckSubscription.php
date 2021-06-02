<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete record, if user\'s subscription is expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usersSubscriptions = UserSubscription::where('expiration_date', '<', Carbon::today())->get();

        foreach ($usersSubscriptions as $usersSubscription) {
            $usersSubscription->delete();
        }
    }
}
