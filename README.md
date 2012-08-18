2Checkout PHP Library
=====================

This library provides developers with a simple set of bindings to the 2Checkout purchase routine, Instant Notification Service and Back Office API.

To use, download or clone the repository.

```shell
git clone https://github.com/craigchristenson/2checkout-php.git
```

Require in your php script.

```php
require_once("/path/to/2checkout-php/lib/Twocheckout.php");
```

JSON is returned by default or you can add 'array' as an additional argument to each call to get an Array.
**Example:**
```php
Twocheckout_Sale::refund($args, 'array');
```

Full documentation for each binding will be provided in the [Wiki](https://github.com/craigchristenson/2checkout-php/wiki).


Example API Usage
-----------------

*Example Request:*

```php
Twocheckout::setCredentials("apiusername", "apipassword");
$args = array('sale_id' => 4753855417);
Twocheckout_Sale::stop($args, 'array');
```

*Example Response:*

```php
Array
(
    [Lineitem(s) Stopped Successfully] => Array
        (
            [0] => 4763150311
            [1] => 4763150323
            [2] => 4763150335
        )

)
```

Example Checkout Usage:
-----------------------

*Example Request:*

```php
$args = array(
    'sid' => 532001,
    'cart_order_id' => 'Example Cart ID',
    'total' => '1.00'
);
Twocheckout_Charge::redirect($args);
```

Example Return Usage:
---------------------

*Example Request:*

```php
$params = array();
foreach ($_REQUEST as $k => $v) {
    $params[$k] = $v;
}
$passback = Twocheckout_Return::check($params, "tango");
```

*Example Response:*

```json
{
  "code" : "Success",
  "message" : "Hash Matched"
}
```

Example INS Usage:
------------------

*Example Request:*

```json
$params = array();
foreach ($_POST as $k => $v) {
    $params[$k] = $v;
}
$passback = Twocheckout_Notification::check($params, "tango");
```

*Example Response:*

```json
{
  "code" : "Success",
  "message" : "Hash Matched"
}
```

Full documentation for each binding will be provided in the [Wiki](https://github.com/craigchristenson/2checkout-php/wiki).
