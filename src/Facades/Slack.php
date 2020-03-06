<?php namespace nguyenanhung\Slack\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Slack
 *
 * @package   nguyenanhung\Slack\Facades
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Slack extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'maknz.slack';
    }

}
