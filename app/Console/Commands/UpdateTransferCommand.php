<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Models\Transfer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateTransferCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pw:update-transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update transfer table cuby';

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
        $transfers = Transfer::all();
        foreach ( $transfers as $transfer ){
            if ( !DB::table( 'usecashnow' )->where( 'userid', $transfer->user_id )->where( 'zoneid', $transfer->zone_id )->take( 1 )->exists() )
            {
                /**
                 * DB::table( 'usecashnow' )->insert([
                 * 'userid' => $transfer->user_id,
                 * 'zoneid' => $transfer->zone_id,
                 * 'sn' => 0,
                 * 'aid' => 1,
                 * 'point' => 0,
                 * 'cash' => $transfer->cash,
                 * 'status' => 1,
                 * 'creatime' => Carbon::now()
                 * ]);
                 * **/
                DB::select('call usecash(?,?,?,?,?,?,?,?)', array(
                    $transfer->user_id, $transfer->zone_id, 0, 1, 0, $transfer->cash, 1, Carbon::now()
                ));
                DB::table('pwp_transfer')
                    ->where('user_id', $transfer->user_id)
                    ->where('zone_id', $transfer->zone_id)
                    ->where('cash', $transfer->cash)
                    ->take(1)->delete();
            }
        }
        return 0;
    }
}
