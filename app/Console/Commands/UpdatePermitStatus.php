<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// Add
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Main\Permit;

class UpdatePermitStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-permit-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Update
        $items = Permit::where('status_id', 5)->get(); //Approved
        if($items->isNotEmpty()){
            foreach($items as $key => $item){
                $expiryDate = Carbon::parse($item->expiry_date)->startOfDay();
                // if ($expiryDate->isPast()){
                if ($expiryDate->isFuture()){
                    $item->update([
                        'status_id'=>7, //Expired
                    ]);
                }
                Log::info("Item status updated successfully for ID: {$item->id}");
            }
        }

    }
}
