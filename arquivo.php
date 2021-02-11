<?php
    $arquivo = 'C:\SPOOL\teste.rem';
    if (file_exists($arquivo)){
        //lerremessa($arquivo);        
    }

    $novo = array();
    $abrir = fopen($arquivo, 'r');
    
    $conteudo = fread($abrir, filesize($arquivo));
    
    $linha = explode("\n",$conteudo);
    $cont = 0;
          
    foreach ($linha as $l){
        $seq = substr($l, 13,1);
        $val = substr($l, 37,20);
        $cVenc = '';
        $cDtJur = '';
        
        if($seq == 'P'){
            $cVenc = substr($l,77,8);
        }

        if($seq == 'R'){
            $cDtJur = substr($l, 66,8);
        }
        
        if($seq == 'R' || $seq == 'P'){
            echo $seq . ' - Vencimento: ' . $cVenc . ' - DtJuros: ' . $cDtJur . '<br>';
        }

    }
?>