<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Http\Helper\RandomStringGenerator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Features;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pw:createAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create Administrator';

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
        $name = $this->ask('Username');
        $email = $this->ask('Email');
        $truename = $this->ask('Full Name');
        $RandPass = RandomStringGenerator::getRandomAlphaNum(6);
        $RandPin = RandomStringGenerator::getRandomNum(6);

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'truename' => $truename
        ], [
            'name' => ['required', 'string', 'between:4,12', 'unique:users', 'alpha_num', 'regex:/^[a-z0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'truename' => ['required', 'string', 'regex:/^[a-zA-Z ]*$/']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        User::forceCreate([
            'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
            'name' => $name,
            'email' => $email,
            'passwd' => Hash::make($name . $RandPass),
            'passwd2' => Hash::make($name . $RandPass),
            'role' => 'Administrator',
            'answer' => config('app.debug') ? $RandPass : '',
            'truename' => ucwords($truename),
            'qq' => Features::enabled(Features::twoFactorAuthentication()) ? '' : $RandPin,
            'creatime' => Carbon::now(),
        ]);


        $this->info('Administraor has been created with details bellow');
        $this->info('Username: ' . $name);
        $this->info('Email: ' . $email);
        $this->info('Full Name: ' . $truename);
        $this->info('Password: ' . $RandPass);
        Features::enabled(Features::twoFactorAuthentication()) ? '' : $this->info('Pin: ' . $RandPin);

        return 0;
    }
}
