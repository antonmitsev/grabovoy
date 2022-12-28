<?php
if(!defined('LIB_INCLUDE_4356')) {
    header("HTTP/1.1 301 Moved Permanently");
    Header('location: /');
    exit(01);
}

class Numbers {
    static $numbers = 
        array(
            array('Очи'),
            array('Подобряване на зрението', '1891014'),
            array('Късогледство', '5189988'),
            array('Далекогледство', '548132198'),
            array('Астегматизъм', '1421543')
        );
}