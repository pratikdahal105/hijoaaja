<?php

namespace App\Console\Commands;

use App\Models\Featured;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyFeaturedCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'featured:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to check featured news';

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
        $dt = Carbon::now()->toDateString();
        $featured = Featured::whereDate('till', '<', $dt)->get();
        if($featured->first()){
            foreach ($featured as $feature){
                $feature->delete();
            }
        }
        return 0;
    }
}
