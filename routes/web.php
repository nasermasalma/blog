<?php


use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $dataR = DB::select('select * from medicines');
    // print_r($dataR);
  // return view('welcome',['dataR'=>$dataR]);



   return view('welcome');
});

Route::get('api/v1/currencies', 'CurrenciesController@index');

Route::get('api/v1/get/{code}', 'CurrenciesController@show');



  


Route::get('/naser', function () {



  $api_response = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/currencies'), true);

 // echo  $api_response;
//print_r($api_response);


  
    foreach($api_response as $annn){

      foreach($annn as $an){

      $records = new App\Currencies;
   
      $records ->name =$an['currencyName'];
      $records ->code =$an['id'];
      if (!empty($an['currencySymbol'])) {
        $records ->symbol =$an['currencySymbol'];
    }
   
      // $records ->rate =$an['currencyName'];

     

      $records ->save();
  }
}
  

  //return view('products/show', compact('response'));
});

