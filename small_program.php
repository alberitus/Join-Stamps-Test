<?php

function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;

    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) return false;
    }
    return true;
}

$result = [];

for ($i = 100; $i >= 1; $i--) {

    if (isPrime($i)) {
        continue;
    }

    // FooBar rules
    if ($i % 15 == 0) {
        $result[] = "FooBar";
    } elseif ($i % 3 == 0) {
        $result[] = "Foo";
    } elseif ($i % 5 == 0) {
        $result[] = "Bar";
    } else {
        $result[] = $i;
    }
}

echo implode(", ", $result);

?>
