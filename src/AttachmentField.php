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
 * Class AttachmentField
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class AttachmentField
{

    /**
     * The required title field of the field
     *
     * @var string
     */
    protected $title;

    /**
     * The required value of the field
     *
     * @var string
     */
    protected $value;

    /**
     * Whether the value is short enough to fit side by side with
     * other values
     *
     * @var boolean
     */
    protected $short = FALSE;

    /**
     * Instantiate a new AttachmentField
     *
     * @param array $attributes
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        if (isset($attributes['title'])) {
            $this->setTitle($attributes['title']);
        }

        if (isset($attributes['value'])) {
            $this->setValue($attributes['value']);
        }

        if (isset($attributes['short'])) {
            $this->setShort($attributes['short']);
        }
    }

    /**
     * Get the title of the field
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the title of the field
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): AttachmentField
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of the field
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set the value of the field
     *
     * @param string $value
     *
     * @return $this
     */
    public function setValue(string $value): AttachmentField
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get whether this field is short enough for displaying
     * side-by-side with other fields
     *
     * @return boolean
     */
    public function getShort(): bool
    {
        return $this->short;
    }

    /**
     * Set whether this field is short enough for displaying
     * side-by-side with other fields
     *
     * @param string $value
     *
     * @return $this
     */
    public function setShort(string $value): AttachmentField
    {
        $this->short = (boolean) $value;

        return $this;
    }

    /**
     * Get the array representation of this attachment field
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'value' => $this->getValue(),
            'short' => $this->getShort()
        ];

    }
}
