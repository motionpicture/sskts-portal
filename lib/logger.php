<?php
/**
 * @author Atsushi Okui <okui@motionpicture.jp>
 * @link https://m-p.backlog.jp/view/SSKTS-124
 */
namespace Sasaki\Cinemasunshine;

use Monolog\Logger as BaseLogger;
use Monolog\Handler\ChromePHPHandler;

use MicrosoftAzure\Storage\Common\ServicesBuilder;

require 'Monolog/Handler/AzureStorageHandler.php';
use Sasaki\Cinemasunshine\Monolog\Handler\AzureStorageHandler;


/**
 * Logger
 *
 * 現状はDB接続時のエラーログ出力のみを考慮した状態。
 * 他の用途で使用する場合は確認、調整すること。
 */
class Logger extends BaseLogger
{
    /**
     * @param string             $name       The logging channel
     * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]         $processors Optional array of processors
     */
    public function __construct($name, array $handlers = array(), array $processors = array())
    {
        parent::__construct($name, $handlers, $processors);

        $this->initialize();
    }

    /**
     * {@inheritdoc}
     */
    public function initialize()
    {
        if (APP_ENV === 'prod') {
            $this->initProd();
        } else {
            $this->initDev();
        }
    }

    /**
     * initalize dev
     */
    private function initDev()
    {
        // chrome PHP
        $this->pushHandler(new ChromePHPHandler(self::DEBUG));

        // Azure Storage
        $storageAccount = 'devsskportal';
        $storageKey = 'je4ygy9MORWT2cuDIiDqqQBVXp5a1XgCrXXFO7khWn0Aq8vX5ABA89EyDnyd7z1RiZWAl3rPWlwJF2DMcZtzow==';
        $connectionString = sprintf('DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s', $storageAccount, $storageKey);
        $blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $this->pushHandler(new AzureStorageHandler($blobClient, 'log', self::ERROR));
    }

    /**
     * initalize prod
     */
    private function initProd()
    {
        // Azure Storage
        $storageAccount = 'prodsskportal';
        $storageKey = '7HF4LEQ20Bt3lo8XUIIf0E73Qfdsnoqlzl4tYJnuPYFiyujTA6MGSyoNX/rvxnnvGcwtAWkW7v/o8Xm+cO5m4w==';
        $connectionString = sprintf('DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s', $storageAccount, $storageKey);
        $blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $this->pushHandler(new AzureStorageHandler($blobClient, 'log', self::ERROR));
    }
}