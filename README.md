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
```bash
  \Jeybin\Apiresponse\ThrowResponse::status(200)
                              ->message('User defined message')
                              ->send(['can send array or string or empty'])
```

Without message

```bash
  \Jeybin\Apiresponse\ThrowResponse::status(200)
                              ->send(['can send array or string or empty'])
```


```bash
  \Jeybin\Apiresponse\ThrowResponse::status('success')->send()
```

Some of the status codes are already defined in the config/jeybin-apiresponse.php file, if you want to add more update that file




    