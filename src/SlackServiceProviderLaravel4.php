<?php namespace nguyenanhung\Slack;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as Guzzle;

/**
 * Class SlackServiceProviderLaravel4
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SlackServiceProviderLaravel4 extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('nguyenanhung/slack', NULL, __DIR__);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['nguyenanhung.slack'] = $this->app->share(function ($app) {
            $allow_markdown = $app['config']->get('slack::allow_markdown');

            $markdown_in_attachments = $app['config']->get('slack::markdown_in_attachments');

            $unfurl_media = $app['config']->get('slack::unfurl_media');

            return new Client(
                $app['config']->get('slack::endpoint'),
                [
                    'channel'                 => $app['config']->get('slack::channel'),
                    'username'                => $app['config']->get('slack::username'),
                    'icon'                    => $app['config']->get('slack::icon'),
                    'link_names'              => $app['config']->get('slack::link_names'),
                    'unfurl_links'            => $app['config']->get('slack::unfurl_links'),
                    'unfurl_media'            => is_bool($unfurl_media) ? $unfurl_media : TRUE,
                    'allow_markdown'          => is_bool($allow_markdown) ? $allow_markdown : TRUE,
                    'markdown_in_attachments' => is_array($markdown_in_attachments) ? $markdown_in_attachments : []
                ],
                new Guzzle
            );
        });

        $this->app->bind('nguyenanhung\Slack\Client', 'nguyenanhung.slack');
    }

}
