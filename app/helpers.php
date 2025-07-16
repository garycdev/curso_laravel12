<?php

use Illuminate\Support\Facades\Crypt;

function encriptarURL(string $id) {
    return Crypt::encrypt($id);
}

function desencriptarURL(string $id) {
    return Crypt::decrypt($id);
}

