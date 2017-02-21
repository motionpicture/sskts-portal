<?php
/**
 * cinesun_sftp
 *
 * @author Atsushi Okui <okui@motionpicuture.jp>
 */

/**
 * CinesunSftp
 */
class CinesunSftp
{
    private $curl;

    /**
     * construct
     */
    public function __construct()
    {
       $this->initialize();
    }

    /**
     * initialize
     */
    public function initialize()
    {
        $curl = curl_init();

        // sftp
        curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_SFTP);

        // auth
        $keyDir = realpath(dirname(__FILE__) . '/sftp_key/' . APP_ENV);
        $publicKey = $keyDir . '/id_rsa.pub';
        $privateKey = $keyDir . '/id_rsa';
        $keyPassphrase = Configure::read('SFTP.key_passphrase');
        curl_setopt($curl, CURLOPT_SSH_AUTH_TYPES, CURLSSH_AUTH_PUBLICKEY);
        curl_setopt($curl, CURLOPT_SSH_PUBLIC_KEYFILE, $publicKey);
        curl_setopt($curl, CURLOPT_SSH_PRIVATE_KEYFILE, $privateKey);
        curl_setopt($curl, CURLOPT_KEYPASSWD, $keyPassphrase);

        $this->curl = $curl;
    }

    /**
     * upload
     *
     * @param string $target  upload target file path
     * @param string $name    upload file name
     * @return boolean
     */
    public function upload($target, $name)
    {
        $curl = curl_copy_handle($this->curl);

        // upload
        curl_setopt($curl, CURLOPT_UPLOAD, true);

        $host = Configure::read('SFTP.host');
        $user = Configure::read('SFTP.user');
        $baseDir = Configure::read('SFTP.base_dir');
        $uploadFile = $baseDir . '/flv/' . $name;
        $url = sprintf('sftp://%s@%s%s', $user, $host, $uploadFile);
        curl_setopt($curl, CURLOPT_URL, $url);

        // upload file
        $fp = fopen($target, 'r');
        curl_setopt($curl, CURLOPT_INFILE, $fp);
        curl_setopt($curl, CURLOPT_INFILESIZE, filesize($target));

        return $this->exec($curl);
    }

    /**
     * remove
     *
     * @param string $name  remove file name
     * @return boolean
     */
    public function remove($name)
    {
        $curl = curl_copy_handle($this->curl);

        $host = Configure::read('SFTP.host');
        $user = Configure::read('SFTP.user');
        $url = sprintf('sftp://%s@%s', $user, $host);
        curl_setopt($curl, CURLOPT_URL, $url);

        $baseDir = Configure::read('SFTP.base_dir');
        $removeFile = $baseDir . '/flv/' . $name;
        curl_setopt($curl, CURLOPT_QUOTE, array('rm ' . $removeFile));

        return $this->exec($curl);
    }

    /**
     * execute
     *
     * @param resource $curl
     * @return boolean
     * @throws RuntimeException
     */
    private function exec($curl)
    {
        $result = curl_exec($curl);

        if (curl_errno($curl) !== 0) {
            $e = new RuntimeException(curl_error($curl), curl_errno($curl));
            curl_close($curl);

            throw $e;
        }

        curl_close($curl);

        return $result;
    }
}