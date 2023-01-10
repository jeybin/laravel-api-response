<?php

return [  
    'status-codes'=>[
        
            /**
             * 200: Standard response for successful HTTP requests.
             */
            200 => 'success',

            /**
             * 201: The request has been fulfilled, 
             *      resulting in the creation of a new resource.
             */
            201 => 'created',

            /**
             * 204: The server successfully processed the request, 
             *      and is not returning any content.
             */
            204 => 'no content',

            /**
             * 205: The server successfully processed the request, 
             *      asks that the requester reset its document view, 
             *      and is not returning any content
             */
            205 => 'reset content',

            /**
             * 206: Partial content. Useful when you have to 
             *      return a paginated list of resources.
             */
            206 => 'partial content',

            /**
             * 400 : The server cannot or will not process the 
             *       request due to an apparent client error 
             */
            400 => 'bad request',

            /**
             * 401: when authentication is required and has failed or
             *      has not yet been provided. 
             */
            401 => 'unauthorized',

            /**
             * 403: The request contained valid data and was understood by the server, 
             *      but the server is refusing action. This may be due to the user not 
             *      having the necessary permissions for a resource or needing an account 
             *      of some sort, or attempting a prohibited action. 
             */
            403 => 'forbidden',

            /**
             * 404: Not found.
             */
            404 => 'not found',

            /**
             * 406: The requested resource is capable of generating only 
             *      content not acceptable according to the Accept headers 
             *      sent in the request.
             */
            406 => 'not acceptable',

            /**
             * 422: The request was well-formed but was unable to be
             *      followed due to semantic errors.
             */
            422 => 'validation error',

            /**
             * 424: The 424 (Failed Dependency) status code means that the method 
             *      could not be performed on the resource because the requested 
             *      action depended on another action and that action failed.
             */
            424 => 'failed Dependency',

            /**
             * 500: A generic error message, given when an 
             *      unexpected condition was encountered and 
             *      no more specific message is suitable
             */
            500 => 'server error',

            /**
             * 503: Service unavailable
             */
            503 => 'service Unavailable',
    ]
];