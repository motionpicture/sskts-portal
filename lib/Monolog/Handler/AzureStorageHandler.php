<?php
/**
 * @author Atsushi Okui <okui@motionpicture.jp>
 * @link https://m-p.backlog.jp/view/SSKTS-124
 */
namespace Sasaki\Cinemasunshine\Monolog\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

use MicrosoftAzure\Storage\Blob\Internal\IBlob;

/**
 * AzureStorageHandler
 *
 * １ログにつき１Blobに出力する。
 */
class AzureStorageHandler extends AbstractProcessingHandler
{
    private $blobClient;
    private $container;

    /**
     * construct
     *
     * @param IBlob    $blobClient
     * @param string   $container  The name of the container.
     * @param int      $level      The minimum logging level at which this handler will be triggered
     * @param Boolean  $bubble     Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(IBlob $blobClient, $container, $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->blobClient = $blobClient;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function write(array $record)
    {
        $this->blobClient->createBlockBlob($this->container, $this->createBlobName(), $record['formatted']);
    }

    /**
     * Blob名生成
     *
     * 日時とユニークIDで一意なBlob名を生成。
     *
     * @return string
     */
    private function createBlobName()
    {
        return date('Ymd/His') . '_' . uniqid() . '.log';
    }
}