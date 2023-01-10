<?php
namespace Jeybin\Apiresponse\Services;

/**
 * Status codes.
 *
 * @author Jeybin George
 * @since 2023-01-10
 */
final class StatusCodeService{
    
    /**
     * Function will fetch all the codes defined in 
     * the config file and check for the search key
     *
     * @param $key
     * @return void
     */
    public static function code($key){

        /**
         * Getting all the status codes from the config file
         */
        $array = config('jeybin-apiresponse.status-codes');

        /**
         * If numeric will check for the key
         */
        if(is_numeric($key)){
            return (!empty($array[$key])) ? ucfirst($array[$key]) : null;
        }else{
            /**
             * Replacing the space with underscore
             */
            $key = strtolower(str_replace('_',' ',$key));

            /**
             * Finding the key using the value from array
             */
            $response = array_keys($array, $key);
            return (!empty($response[0])) ? $response[0] : null;
        }
    }
    

   
}
