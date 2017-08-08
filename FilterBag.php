<?php namespace Flatphp\Databag;


class FilterBag extends BaseBag
{
    use SanitizationTrait;
    use ValidationTrait;

    protected $rules = [];
    protected $messages = [];

    public function __construct(array $data = [])
    {
        foreach ($this->rules as $key => $item) {
            if (!is_array($item)) {
                $item = [$item];
            }
            $this->sanitize_rules[$key] = $item[0];
            if (isset($item[1])) {
                $this->validate_rules[$key] = $item[1];
            }
        }

        if ($this->messages) {
            $this->setValidateMessages($this->messages);
        }

        parent::__construct($data);
    }
}