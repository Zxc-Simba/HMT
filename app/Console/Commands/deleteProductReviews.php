<?php

namespace App\Console\Commands;

use App\Models\ProductRating;
use Illuminate\Console\Command;

class deleteProductReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete all reviews on product';

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
        ProductRating::where('product_id', $this->argument('id'))->delete();
        return 0;
    }
}
