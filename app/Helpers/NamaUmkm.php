<?php

    function getNamaUmkm($nama){
        $umkm = null;
        if ($nama == 'mpg'){
            $umkm = 'Merah Putih Grosir';
        } elseif($nama == 'ts'){
            $umkm = 'Tokyo Style';
        } elseif($nama == 'gb'){
            $umkm = 'Granada Busana';
        } elseif($nama == 'st'){
            $umkm = 'Star';
        } elseif($nama == 'bb'){
            $umkm = 'Bas Baby';
        }
        return $umkm;
    }
