<?php

    function getNamaUmkm($nama){
        $umkm = null;
        if ($nama == 'mpg'){
            $umkm = 'Merah Putih Grosir';
        } elseif($nama == 'ivo'){
            $umkm = 'IVO';
        } elseif($nama == 'ts'){
            $umkm = 'Tokyo Style';
        } elseif($nama == 'dt'){
            $umkm = 'Dunia Tekstil';
        } elseif($nama == 'it'){
            $umkm = 'Istana Tekstil';
        }
        return $umkm;
    }
