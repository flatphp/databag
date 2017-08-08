<?php namespace Flatphp\Databag;

use Flatphp\Filter\Sanitizer;

trait SanitizationTrait
{
    protected $sanitize_rules = [];

    public function setSanitizeRules(array $rules)
    {
        $this->sanitize_rules = $rules;
        return $this;
    }

    protected function fillData($key, $value)
    {
        $this->data[$key] = isset($this->sanitize_rules[$key]) ? $this->sanitize($value, $this->sanitize_rules[$key]) : $value;
    }

    protected function sanitize($value, $rule)
    {
        return Sanitizer::sanitizeOne($value, $rule);
    }
}