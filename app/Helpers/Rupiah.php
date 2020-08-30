<?php

function Rupiah($amount = 0) {
    return  "Rp " . number_format(intval($amount),0, '', '.');
}
