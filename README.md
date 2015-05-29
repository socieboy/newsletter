# Laravel Newsletter
Mailchimp manager.

Add the service provider to the provider array on the app.php config file
```
Socieboy\Newsletter\NewsletterServiceProvider
```

Execute the command
```
php artisan vendor:publish
```

To publish on the config folder the newsletter.php file
```
return [
    'lists' => [
        'test' => '123123123',
        'other-list' => '123123123',
        'n' => '123123123'
    ]
];
```
On the lists key set a name of each list id on mailchimp.

Don't forget to add to your .env file the mailchimp api key.

```
MAILCHIMP_APIKEY = 00000000000
```
