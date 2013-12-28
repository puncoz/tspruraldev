<?php

return array(
    'appenders' => array(
        'default' => array(
            'class' => 'LoggerAppenderRollingFile',
            'layout' => array(
                'class' => 'LoggerLayoutPattern',
                'params' => array(
                    'conversionPattern' => '%date{d.m.Y H:i:s,u} | %logger %-5level %msg%n'
                )
            ),
            'params' => array(
                'file' => dirname(LIB_PATH).DS.'logs'.DS.'file.log',
                'maxFileSize' => '1MB',
                'maxBackupIndex' => 5,
            ),
        ),
    ),
    'rootLogger' => array(
        'appenders' => array('default'),
        'level' => 'WARN',
    ),
);
