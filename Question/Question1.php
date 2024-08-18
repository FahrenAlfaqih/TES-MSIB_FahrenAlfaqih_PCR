<?php
function maxProduct($arr) {
    //hitung arraynya
    if (count($arr) < 2) return 0;
    //kemudian sorting
    sort($arr);
    
    // Dua angka terbesar
    $max1 = $arr[count($arr) - 1];
    $max2 = $arr[count($arr) - 2];
    
    // Dua angka terkecil
    $min1 = $arr[0];
    $min2 = $arr[1];
    
    // hitung produk
    $product1 = $max1 * $max2;
    $product2 = $min1 * $min2;
    return max($product1, $product2);
}

// Contoh 
$input = [1, 20, 3, 10, 5];
$input2 =  [-10, -20, 3, 5];

echo "Example one : ";
echo maxProduct($input);
echo "<br>";
echo "Example two : ";
echo maxProduct($input2);
?>