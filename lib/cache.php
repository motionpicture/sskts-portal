<?php
/**
 * Description of cache.
 *
 * @author Atsushi Okui <okui@motionpicture.jp>
 */

// ajaxではrequire.phpが読み込まれないので
require_once 'const.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

use phpFastCache\CacheManager;

/**
 * CinesunCache
 */
class CinesunCache
{
    private $manager;

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
        $config = array(
            'path' => CACHE_DIR,
        );
        $this->manager = CacheManager::getInstance('files', $config);
    }

    /**
     * Confirms if the cache item lookup resulted in a cache hit.
     *
     * @param string $key
     * @return bool
     */
    public function isHit($key)
    {
        return $this->manager->getItem($key)->isHit();
    }

    /**
     * Retrieves the value of the item from the cache associated with this object's key.
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->manager->getItem($key)->get();
    }

    /**
     * Persists a cache item immediately.
     *
     * @param string $key
     * @param mixed $data
     * @param int|\DateInterval|null $time
     * @return bool
     */
    public function save($key, $data, $time)
    {
        $cahce = $this->manager->getItem($key);
        $cahce->set($data)->expiresAfter($time);

        return $this->manager->save($cahce);
    }
}