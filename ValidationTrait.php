<?php namespace Flatphp\Databag;

use Flatphp\Filter\Validator;

trait ValidationTrait
{
    protected $validate_rules = [];
    protected $validate_messages = [];

    public function setValidateRules($rules)
    {
        $this->validate_rules = $rules;
        return $this;
    }

    public function setValidateMessages($messages)
    {
        $this->validate_messages = $messages;
        return $this;
    }

    public function pass()
    {
        return Validator::validate($this->data, $this->validate_rules, $this->validate_messages);
    }

    public function fail()
    {
        return !$this->pass();
    }

    public function getFailedMessage()
    {
        return Validator::getFailedMessage();
    }

    public function getFailedKey()
    {
        return Validator::getFailedKey();
    }

    public function getFailedOn()
    {
        return Validator::getFailedOn();
    }
}