<?php
/**
 * Project slack
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/20/2021
 * Time: 15:15
 */

namespace nguyenanhung\Slack;

/**
 * Class SlackSimpleMessenger
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SlackSimpleMessenger
{
    const SLACK_MESSENGER_CONFIG_KEY = 'slack_messages';

    /** @var array|null SDK Config */
    protected $sdkConfig;
    /** @var array|null Setup Client Attributes */
    protected $clientAttributes;
    /** @var string|null Incoming WebHooks URL received Message */
    protected $incomingUrl;
    /** @var string|null Target Channel received Message */
    protected $targetChannel;
    /** @var mixed Content Message */
    protected $contentMessage;
    /** @var mixed Attach Message */
    protected $attachMessage;
    /** @var bool Cấu hình Message sử dụng Markdown */
    protected $useMarkdown;

    /**
     * MonitorSlackMessenger constructor.
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct()
    {
    }

    /**
     * Function setSdkConfig
     *
     * @param array $sdkConfig
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 18:21
     */
    public function setSdkConfig(array $sdkConfig = array()): SlackSimpleMessenger
    {
        $this->sdkConfig = $sdkConfig;

        return $this;
    }

    /**
     * Function getSdkConfig
     *
     * @return array|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 18:24
     */
    public function getSdkConfig()
    {
        return $this->sdkConfig;
    }


    /**
     * Function setClientAttributes
     *
     * @param array $clientAttributes
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:36
     */
    public function setClientAttributes(array $clientAttributes = array()): SlackSimpleMessenger
    {
        $this->clientAttributes = $clientAttributes;

        return $this;
    }

    /**
     * Function getClientAttributes
     *
     * @return array|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:29
     */
    public function getClientAttributes()
    {
        return $this->clientAttributes;
    }

    /**
     * Function setIncomingUrl
     *
     * @param string $incomingUrl
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:40
     */
    public function setIncomingUrl(string $incomingUrl = ''): SlackSimpleMessenger
    {
        $this->incomingUrl = $incomingUrl;

        return $this;
    }

    /**
     * Function getIncomingUrl
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:42
     */
    public function getIncomingUrl()
    {
        return $this->incomingUrl;
    }

    /**
     * Function setTargetChannel
     *
     * @param string $targetChannel
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:44
     */
    public function setTargetChannel(string $targetChannel = ''): SlackSimpleMessenger
    {
        $this->targetChannel = $targetChannel;

        return $this;
    }

    /**
     * Function getTargetChannel
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:47
     */
    public function getTargetChannel()
    {
        return $this->targetChannel;
    }

    /**
     * Function setContentMessage
     *
     * @param string $contentMessage
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:50
     */
    public function setContentMessage(string $contentMessage = ''): SlackSimpleMessenger
    {
        $this->contentMessage = $contentMessage;

        return $this;
    }

    /**
     * Function getContentMessage
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:52
     */
    public function getContentMessage()
    {
        return $this->contentMessage;
    }

    /**
     * Function setAttachMessage
     *
     * @param $attachMessage
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:54
     */
    public function setAttachMessage($attachMessage): SlackSimpleMessenger
    {
        $this->attachMessage = $attachMessage;

        return $this;
    }

    /**
     * Function getAttachMessage
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:57
     */
    public function getAttachMessage()
    {
        return $this->attachMessage;
    }

    /**
     * Function setUseMarkdown
     *
     * @param false $useMarkdown
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 19:59
     */
    public function setUseMarkdown(bool $useMarkdown = false): SlackSimpleMessenger
    {
        $this->useMarkdown = $useMarkdown;

        return $this;
    }

    /**
     * Function send
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 20:42
     */
    public function send()
    {
        $incomingUrl      = !empty($this->incomingUrl) ? $this->incomingUrl : $this->sdkConfig[self::SLACK_MESSENGER_CONFIG_KEY]['incoming_url'];
        $clientAttributes = is_array($this->clientAttributes) ? $this->clientAttributes : array();
        $client           = new Client($incomingUrl, $clientAttributes);
        $message          = new Message($client);
        $message->to($this->targetChannel);
        if (!empty($this->attachMessage)) {
            $message->attach($this->attachMessage);
        }
        if (!empty($this->contentMessage)) {
            $message->setText($this->contentMessage);
        }
        if ($this->useMarkdown === true) {
            $message->enableMarkdown();
        }

        $message->send();
    }
}
