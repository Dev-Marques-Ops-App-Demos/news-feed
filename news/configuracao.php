<?php
# URL DO SISTEMA DE NOTICIAS
$protocol = 'http://';
$address = getenv('ADDRESS');
$port = getenv('PORT');

#const urlnoticias = 'http://localhost:8587';
#const urlnoticias = "{$protocol}{$address}{$port}";
$urlnoticias = "{$protocol}{$address}:{$port}";
?>
