<?php



namespace App\Helpers;



class MyCurrencyClass {



    public function rate($sym)

    {

        $api_response = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=USD_'.$sym.'&compact=y'), true);
        
        foreach($api_response as $annn){

           
      
            
            
         
                return $annn['val'];
       
      
           
      
         
        
      }



        return 0;

    }

}