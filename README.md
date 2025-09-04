# INSTALL

composer require wescleylima/math-php

# SAMPLE
```
use Wescley\Math\Money;

$value1 = "10.50123";
$value2 = "2.35";
$value3 = "8.735";
$scale = 5;

$price1 = new Money($value1, $scale);
$price2 = new Money($value2, $scale);
$price3 = new Money($value3, $scale);

$price1->sum($price2);
$price1->sum($price3);
$price1->subtract($price3);
$price1->subtract($price2);
$price1->multiply($price2);
$price1->divide($price2);
echo $price1->getAmount();
```