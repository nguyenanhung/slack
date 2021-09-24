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

use InvalidArgumentException;

/**
 * Class Message
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Message
{

    /**
     * Reference to the Slack client responsible for sending
     * the message
     *
     * @var \nguyenanhung\Slack\Client
     */
    protected $client;

    /**
     * The text to send with the message
     *
     * @var string
     */
    protected $text;

    /**
     * The channel the message should be sent to
     *
     * @var string
     */
    protected $channel;

    /**
     * The username the message should be sent as
     *
     * @var string
     */
    protected $username;

    /**
     * The URL to the icon to use
     *
     * @var string
     */
    protected $icon;

    // The type of icon we are using
    protected $iconType;

    /**
     * Whether the message text should be interpreted in Slack's
     * Markdown-like language
     *
     * @var boolean
     */
    protected $allow_markdown = true;

    /**
     * The attachment fields which should be formatted with
     * Slack's Markdown-like language
     *
     * @var array
     */
    protected $markdown_in_attachments = [];

    /**
     * An array of attachments to send
     *
     * @var array
     */
    protected $attachments = [];

    /**
     *
     * @var string
     */
    const ICON_TYPE_URL = 'icon_url';

    /**
     *
     * @var string
     */
    const ICON_TYPE_EMOJI = 'icon_emoji';

    /**
     * Instantiate a new Message
     *
     * @param \nguyenanhung\Slack\Client $client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the message text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Set the message text
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text): Message
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the channel we will post to
     *
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * Set the channel we will post to
     *
     * @param string $channel
     *
     * @return $this
     */
    public function setChannel(string $channel): Message
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get the username we will post as
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the username we will post as
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username): Message
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the icon (either URL or emoji) we will post as
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Set the icon (either URL or emoji) we will post as.
     *
     * @param string $icon
     *
     * @return $this|void
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 3/6/20 16:16
     */
    public function setIcon(string $icon)
    {
        if ($icon === null) {
            $this->icon = $this->iconType = null;

            return;
        }

        if (mb_strpos($icon, ":") === 0 && mb_substr($icon, mb_strlen($icon) - 1, 1) === ":") {
            $this->iconType = self::ICON_TYPE_EMOJI;
        } else {
            $this->iconType = self::ICON_TYPE_URL;
        }

        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the icon type being used, if an icon is set
     *
     * @return string
     */
    public function getIconType(): string
    {
        return $this->iconType;
    }

    /**
     * Get whether message text should be formatted with
     * Slack's Markdown-like language
     *
     * @return boolean
     */
    public function getAllowMarkdown(): bool
    {
        return $this->allow_markdown;
    }

    /**
     * Set whether message text should be formatted with
     * Slack's Markdown-like language
     *
     * @param boolean $value
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 3/6/20 16:58
     */
    public function setAllowMarkdown(bool $value): Message
    {
        $this->allow_markdown = $value;

        return $this;
    }

    /**
     * Enable Markdown formatting for the message
     *
     * @return $this
     */
    public function enableMarkdown(): Message
    {
        $this->setAllowMarkdown(true);

        return $this;
    }

    /**
     * Disable Markdown formatting for the message
     *
     * @return $this
     */
    public function disableMarkdown(): Message
    {
        $this->setAllowMarkdown(false);

        return $this;
    }

    /**
     * Get the attachment fields which should be formatted
     * in Slack's Markdown-like language
     *
     * @return array
     */
    public function getMarkdownInAttachments(): array
    {
        return $this->markdown_in_attachments;
    }

    /**
     * Set the attachment fields which should be formatted
     * in Slack's Markdown-like language
     *
     * @param array $fields
     *
     * @return $this
     */
    public function setMarkdownInAttachments(array $fields): Message
    {
        $this->markdown_in_attachments = $fields;

        return $this;
    }

    /**
     * Change the name of the user the post will be made as
     *
     * @param string $username
     *
     * @return $this
     */
    public function from(string $username): Message
    {
        $this->setUsername($username);

        return $this;
    }

    /**
     * Change the channel the post will be made to
     *
     * @param string $channel
     *
     * @return $this
     */
    public function to(string $channel): Message
    {
        $this->setChannel($channel);

        return $this;
    }

    /**
     * Chainable method for setting the icon
     *
     * @param string $icon
     *
     * @return $this
     */
    public function withIcon(string $icon): Message
    {
        $this->setIcon($icon);

        return $this;
    }

    /**
     * Add an attachment to the message
     *
     * @param mixed $attachment
     *
     * @return $this
     */
    public function attach($attachment): Message
    {
        if ($attachment instanceof Attachment) {
            $this->attachments[] = $attachment;

            return $this;
        }

        if (is_array($attachment)) {
            $attachmentObject = new Attachment($attachment);

            if (!isset($attachment['mrkdwn_in'])) {
                $attachmentObject->setMarkdownFields($this->getMarkdownInAttachments());
            }

            $this->attachments[] = $attachmentObject;

            return $this;
        }

        throw new InvalidArgumentException('Attachment must be an instance of nguyenanhung\\Slack\\Attachment or a keyed array');
    }

    /**
     * Get the attachments for the message
     *
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * Set the attachments for the message
     *
     * @param array $attachments
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 3/6/20 18:01
     */
    public function setAttachments(array $attachments): Message
    {
        $this->clearAttachments();

        foreach ($attachments as $attachment) {
            $this->attach($attachment);
        }

        return $this;
    }

    /**
     * Remove all attachments for the message
     *
     * @return $this
     */
    public function clearAttachments(): Message
    {
        $this->attachments = [];

        return $this;
    }

    /**
     * Function Send the message
     *
     * @param string|null $text The text to send
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/24/2021 03:34
     */
    public function send(string $text = null)
    {
        if ($text) {
            $this->setText($text);
        }

        $this->client->sendMessage($this);
    }
}
