<?php

use Flatphp\Databag\FilterBag;

class MyData extends FilterBag
{
    /*
    protected $sanitize_rules = array(
        'data1' => 'trim|lower',
        'data2' => 'trim'
    );

    protected $validate_rules = array(
        'data2' => 'required|email'
    );

    protected $validate_messages = array(
        'data2.required' => 'data2 is required',
        'data2.email' => 'data2 must be email'
    );
    */

    protected $rules = array(
        'data1' => 'trim|lower',
        'data2' => ['trim', 'required|email']
    );

    protected $messages = array(
        'data2.required' => 'data2 is required',
        'data2.email' => 'data2 must be email'
    );
}
