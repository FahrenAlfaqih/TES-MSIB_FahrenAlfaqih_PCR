<?php
function minTrucks($capacities, $Y) {
    $n = count($capacities);
    $dp = array_fill(0, $Y + 1, PHP_INT_MAX); // Array DP untuk menyimpan jumlah truk minimum
    $dp[0] = 0; // Tidak memerlukan truk untuk 0 ton
    for ($i = 1; $i <= $Y; $i++) {
        foreach ($capacities as $capacity) {
            if ($i - $capacity >= 0 && $dp[$i - $capacity] != PHP_INT_MAX) {
                $dp[$i] = min($dp[$i], $dp[$i - $capacity] + 1);
            }
            
        }
    }

    if ($dp[$Y] == PHP_INT_MAX) {
        return "Tidak ada solusi yang ditemukan.";
    }

    // Mencetak hasil
    $result = [];
    $remaining = $Y;

    //Menemukan kombinasi truk
    while ($remaining > 0) {
        foreach ($capacities as $capacity) {
            if ($remaining - $capacity >= 0 && $dp[$remaining - $capacity] == $dp[$remaining] - 1) {
                if (!isset($result[$capacity])) {
                    $result[$capacity] = 0;
                }
                $result[$capacity]++;
                $remaining -= $capacity;
                break;
            }
        }
    }

    return $result;
}

//Contoh
$capacities = [5, 11, 23];
$Y = 100;

$result = minTrucks($capacities, $Y);

if (is_array($result)) {
    echo "Jumlah truk yang diperlukan:";
    echo "<br>";
    foreach ($result as $capacity => $count) {
        echo "Truk kapasitas $capacity ton: $count truk\n";
        echo "<br>";

    }
} else {
    echo $result;
}
?>


