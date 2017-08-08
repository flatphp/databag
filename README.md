# databag
data bag component

#install
```
composer require "flatphp/databag"
```

# usage
```php
use Flatphp\Databag\FilterBag;

class MyData extends FilterBag
{
    protected $rules = array(
        'data1' => 'trim|lower',
        'data2' => ['trim', 'required|email']
    );

    protected $messages = array(
        'data2.required' => 'data2 is required',
        'data2.email' => 'data2 must be email'
    );
}


$data = new MyData(array(
    'data1' => ' hello test ',
    'data2' => ' world'
));


if ($data->fail()) {
    echo $data->getFailedMessage();
} else {
    foreach ($data as $key => $value) {
	echo $key .' - '. $value;
    }
}
```