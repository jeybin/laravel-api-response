# Laravel API Response Helper

## Installation


You can install the package via composer:

```bash
  composer jeybin/apiresponse
```

To publish providers and to copy the config files run :  

```bash
  php artisan apiresponse:install
```

Usage
```bash
  \Jeybin\Apiresponse\Response::status(200)
                              ->message('User defined message')
                              ->send(['can send array or string or empty'])
```

Without message

```bash
  \Jeybin\Apiresponse\Response::status(200)
                              ->send(['can send array or string or empty'])
```


```bash
  \Jeybin\Apiresponse\Response::status('success')->send()
```

Some of the status codes are already defined in the config/jeybin-apiresponse.php file, if you want to add more update that file




    