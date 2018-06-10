# Fast Framework
Fastest 🚀, very easy to use 😮, and free 😄 API building framework for PHP

## File structure

- index.php
- .htaccess
- app/app.php
- app/functions.php
- app/main.php
- system/autoload.php
- system/core/basetypes.php
- system/core/database.php
- system/core/medoo.class.php
- system/core/micro.php

## Main features

**37KB uncompressed package** \
**Fastest framework even** \
**Easy to use** \
**Free and open source**

## User guide

1. Download using git

```bash
$ git clone https://github.com/Whilend/Fast-Framework.git
```

2. Configure database and more index.php

```php
<?php

define("SUPERFAST", __DIR__.'/');
define("DEBUG_MODE", TRUE);                // Enable (Disable) debug mode

$config = Array(
	'db'              =>
		Array(
			'database_type' => 'mysql',           // Database driver
			'database_name' => 'test',            // Database name
			'server'        => '127.0.0.1',       // Database server
			'username'      => 'root',            // Username
			'password'      => '',                // Password
			'debug_mode'    => DEBUG_MODE
		)
);
...
```

3. Handle some methods from main.php

```php
<?php

$app->method('/login', function ($request, $response, $app) {
	// Called when if user sent POST to /login

	$result = $app->db->select('users', '*', array(
		'username' => $request->post('username'),
		'password' => md5($request->post('password'))
	))->first();

	$response->json->status = $result != NULL;
	$response->json->profile = $result;
	$response->write_json();
});
```

> **Need more documentation?**
> Then star, and share this repo with your friends
