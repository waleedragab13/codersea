<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;

class companyEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:employees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send weekly mail to Companies which in your system with new Employees entered in this week';

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
     * @return mixed
     */
    public function handle()
    {
        $lastWeek = Carbon::now()->subWeek();
        $companies = Company::all();
        foreach ($companies as $company) {
            $employees = Employee::where('company_id',$company->id)->where('created_at','>=',$lastWeek);
            if(!empty($employees)){
               Mail::to($company->email)->send(new SendMail());
            }
        }

    }
}
