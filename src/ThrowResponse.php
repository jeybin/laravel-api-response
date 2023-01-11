<?php
namespace Jeybin\Apiresponse;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Jeybin\Apiresponse\Services\StatusCodeService;

final class ThrowResponse{
    
    private $statusCode = '';
    private $message    = '';
    private $data       = [];
    private $headers    = [];
    
    public static function status(int $code){
        $object = new self;
        $object->statusCode = $code;
        return $object;
    }

    public function message(string $message=''){
        $this->message = $message;
        return $this;
    }

    public function headers(array $headers=[]){
        array_push($headers,['Content-Type'=>'application/json']);
        $this->headers = $headers;
        return $this;
    }


    public function throw($data=[]){
        $response = $this->generateResponse($data);
        throw new HttpResponseException($response);
    }

    public function get($data=[]){
        $response = $this->generateResponse($data);
        return $response;
    }


    private function generateResponse($data=[]){
        /**
         *  Checking if the the response codes are success
         */
        $errorKey = (in_array($this->statusCode,[StatusCodeService::code('SUCCESS'),StatusCodeService::code('CREATED')])) ? false : true; 

        /**
         * Setting up the message, if empty will take it using service
         */
        $message  = (!empty($this->message)) ? $this->message : StatusCodeService::code($this->statusCode);

        /**
         * Generating response array
         */
        $response = ['code'    => (int)$this->statusCode,
                     'error'   => $errorKey,
                     'message' => $message];

        if(!empty($data)){
            $response['data'] = $data;
        }

        $response =  response()->json($response,$this->statusCode);

        /**
         * Setting up the headers to the response
         */
        foreach($this->headers as $hKey => $header){
            $response = $response->header($hKey,$header);
        }


        return $response;
    }


    /**
     * For adding in the catch 
     *
     * eg : catch(\Exception $ex){ ThrowResponse::exception($ex); }
     */
    public static function exception($exception){
        /**
         * Setting the error code as 500
         */
        $errorCode = StatusCodeService::code('SERVER_ERROR');

        if(request()->wantsJson()) {

            if($exception->getMessage()){
                $data      = (!empty($exception->getTrace()))   ? $exception->getTrace()   : [];
                $message   = (!empty($exception->getMessage())) ? $exception->getMessage() : "Something went wrong";
                $data      = $data?:[$data];
                $return = ['code'=>(int)$errorCode,'error'=>true,'message'=>"Exception : ".$message,'data'=>$data];
            }else{
                $return = $exception->getResponse();
            }

            $return =  response()->json($return,$errorCode)->header('Content-Type', 'application/json');
            throw new HttpResponseException($return);

        } else{
            if(is_object($exception)){
                throw $exception;
            }else{
                return $exception;
            }
        }
    }


}