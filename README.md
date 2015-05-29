# Laravel Newsletter
Mailchimp manager.

# Configuration 

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


# Usage

% Subscribe an email to lists.

On your controller or whatever place where you need to subscribe an email to a list on mailchimp.
Subscribe to mailchimp "test" list defined on the config file.
```
<?php namespace App\Http\Controllers;

use Socieboy\Newsletter\Subscriber\SubscriberList as Subscriber;
use App\Http\Requests\Request;

class HomeController extends Controller {

	public function index(Request $request, Subscriber $subscriber)
	{
		$data = $request->only('email');
	    
		$subscriber->subscribe('test', $data['email'])
	    
		echo 'Done';
	}

}

```
