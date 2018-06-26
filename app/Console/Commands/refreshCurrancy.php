<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Currencies;



class refreshCurrancy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refreshCurrancy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $api_response = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/currencies'), true);

 // echo  $api_response;
//print_r($api_response);


  
    foreach($api_response as $annn){

      foreach($annn as $an){

      $records = new Currencies;
   
      $records ->name =$an['currencyName'];
      $records ->code =$an['id'];
      if (!empty($an['currencySymbol'])) {
        $records ->symbol =$an['currencySymbol'];
    }
   
      // $records ->rate =$an['currencyName'];

     

      $records ->save();
  }
}
    }
}
