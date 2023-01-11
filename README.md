# Laravel API Response Helper

## Installation


You can install the package via composer:

```bash
  composer require jeybin/apiresponse
```

To publish providers and to copy the config files run :  

```bash
  php artisan apiresponse:install
```
Usage

If you want to get the response as array you can use:

```bash
  \Jeybin\Apiresponse\ThrowResponse::status(200)
                              ->message('User defined message')
                              ->get(['can send array or string or empty'])
```

or else if you want to throw the response you can use:

```bash
  \Jeybin\Apiresponse\ThrowResponse::status(200)
                              ->message('User defined message')
                              ->throw(['can send array or string or empty'])
```

Without message

```bash
  \Jeybin\Apiresponse\ThrowResponse::status(200)
                              ->throw(['can send array or string or empty'])
```


```bash
  \Jeybin\Apiresponse\ThrowResponse::status('success')->throw()
```

Some of the status codes are already defined in the config/jeybin-apiresponse.php file, if you want to add more update that file




    