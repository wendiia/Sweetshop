<?php
class TestService
{
    protected int $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}

$three = new TestService(3);
$four = new TestService(4);


//function test(TestService $test, int $delta): void
//{
//    var_dump($test->getValue() + $delta);
//}
//
//test($three, 2);
//test($four, 2);

$closure = function ($delta) {
    var_dump($this->getValue() + $delta);
};

//var_dump($closure);

$closure->call($three, 2);
$closure->call($four, 2);

$a = $three->getValue();
$b = [$three, 'getValue'];
var_dump($three->getValue());
var_dump($b());

