<?php
function dapatWaktu(){
    date_default_timezone_set("Asia/Jakarta");
    $hour = date('H', time());
    if( $hour > 5 && $hour <= 9) {
    return "Selamat Pagi";
    }
    else if($hour > 9 && $hour <= 14) {
    return "Selamat Siang";
    }
    else if($hour > 14 && $hour <= 18) {
    return "Selamat Sore";
    }
    else if($hour > 18 && $hour <= 21){
        return "Selamat Malam";
    }
    else if($hour > 21 && $hour <= 23 || $hour >= 0 && $hour <= 5){
        return "Toko buka dari 6 pagi sampai 10 malam. Selamat Malam";
    }
}
?>
<div class="px-2 py-4 mb-4 bg-secondary">
    <div class="container-fluid">
      <h1 class="display-6 fw-bold text-light">{{ $slot }}</h1>
      <p class="col-md-10 text-light">{{ dapatWaktu(); }} {{ request()->route()->getName() != 'userDetail' ? auth()->user()->nama ?? '' : '' }}.</p>
      <p class="col-md-10 text-light">{{ $body }}</p>
        {{ $tombol }}
    </div>
</div>
