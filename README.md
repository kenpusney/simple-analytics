# Simple and stupid web analytics

### Usage:

Setup a php server under `server/` folder. e.g. `php -S localhost:8081`, and include
a single line in your every html source code:
```html
<script src="http://localhost:8081/ka.js.php?id=chooseYourOwnId"></script>
```

Replace the host and `id` param with your self id, and then every request will hit on
on this analytics server.

You can retrieve collected analytics data via report.php by using following 3 params:
```
/report.php?date=2011-11-11&limit=100&skip=0
```

For each of these params:
  - `date`: the date which you want to retrieve analytics data, default: current date.
  - `limit`: the amounts you want to retrieve, default: 100.
  - `skip`: the offsite you want to skip.

see `client/index.html` for a quick example.

### DBA Handlers

We uses simple KV database to store all the data and split them by date, PHP have
DBA handlers enabled to get fast support for this kind of data storage.

You can check all your handlers by using `dba_handlers()`, and we strongly recommend
`tokyocarbinet` as the engine.

You can change the default(`ndbm`) handler in `common.php`
```php
define('DBA_HANDLER', '<the handler type>');
```

### Authentications

To make sure everyting works well, you need to implement `auth()` and `registered($id)`
functions in `server/auth.php`. These two functions used for authenticating when add
entry and check the report.

To access report, you need provide a url param `auth_key`.

### Changelog

 - 2017-12-15
   - First version
   - Implement basic authentications
   - Add support for customized dba handler type