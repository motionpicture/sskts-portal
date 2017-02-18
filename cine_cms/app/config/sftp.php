<?php
/**
 * config of SFTP.
 *
 * @author Atsushi Okui <okui@motionpicuture.jp>
 */

$baseDir = '/var/www/cinemasunshine';

if (APP_ENV === 'prod') {
    $user = 'cinesun';
    $keyPassphrase = 'QgSeM7mQ4krZPIohDU';
    $baseDir .= '/prod';
} else if (APP_ENV === 'stg') {
    $user = '';
    $keyPassphrase = '';
    $baseDir .= '/stg';
} else {
    $user = 'cine_dev';
    $keyPassphrase = 'C5oN6ybUt58bUzLsk9';
    $baseDir .= '/dev';
}


$config['SFTP']['host'] = '160.16.87.153';
$config['SFTP']['user'] = $user;
$config['SFTP']['key_passphrase'] = $keyPassphrase;

$config['SFTP']['base_dir'] = $baseDir;
