<?php

use nguyenanhung\Slack\Client;
use nguyenanhung\Slack\Attachment;
use nguyenanhung\Slack\AttachmentField;

class AttachmentUnitTest extends PHPUnit_Framework_TestCase
{

    public function testAttachmentCreationFromArray()
    {
        $a = new Attachment([
                                'fallback'  => 'Fallback',
                                'text'      => 'Text',
                                'pretext'   => 'Pretext',
                                'color'     => 'bad',
                                'mrkdwn_in' => ['pretext', 'text', 'fields']
                            ]);

        $this->assertEquals('Fallback', $a->getFallback());

        $this->assertEquals('Text', $a->getText());

        $this->assertEquals('Pretext', $a->getPretext());

        $this->assertEquals('bad', $a->getColor());

        $this->assertEquals([], $a->getFields());

        $this->assertEquals(['pretext', 'text', 'fields'], $a->getMarkdownFields());
    }

    public function testAttachmentCreationFromArrayWithFields()
    {
        $a = new Attachment([
                                'fallback'  => 'Fallback',
                                'text'      => 'Text',
                                'pretext'   => 'Pretext',
                                'color'     => 'bad',
                                'mrkdwn_in' => [],
                                'fields'    => [
                                    [
                                        'title' => 'Title 1',
                                        'value' => 'Value 1',
                                        'short' => FALSE
                                    ],
                                    [
                                        'title' => 'Title 2',
                                        'value' => 'Value 1',
                                        'short' => FALSE
                                    ]
                                ]
                            ]);

        $fields = $a->getFields();

        $this->assertSame('Title 1', $fields[0]->getTitle());

        $this->assertSame('Title 2', $fields[1]->getTitle());
    }

    public function testAttachmentToArray()
    {
        $array = [
            'fallback'    => 'Fallback',
            'text'        => 'Text',
            'pretext'     => 'Pretext',
            'color'       => 'bad',
            'mrkdwn_in'   => ['pretext', 'text'],
            'image_url'   => 'http://fake.host/image.png',
            'thumb_url'   => 'http://fake.host/image.png',
            'title'       => 'A title',
            'title_link'  => 'http://fake.host/',
            'author_name' => 'Joe Bloggs',
            'author_link' => 'http://fake.host/',
            'author_icon' => 'http://fake.host/image.png',
            'fields'      => [
                [
                    'title' => 'Title 1',
                    'value' => 'Value 1',
                    'short' => FALSE
                ],
                [
                    'title' => 'Title 2',
                    'value' => 'Value 1',
                    'short' => FALSE
                ]
            ]
        ];

        $a = new Attachment($array);

        $this->assertSame($array, $a->toArray());
    }

    public function testAddFieldAsArray()
    {
        $a = new Attachment([
                                'fallback' => 'Fallback',
                                'text'     => 'Text'
                            ]);

        $a->addField([
                         'title' => 'Title 1',
                         'value' => 'Value 1',
                         'short' => TRUE
                     ]);

        $fields = $a->getFields();

        $this->assertSame(1, count($fields));

        $this->assertSame('Title 1', $fields[0]->getTitle());
    }

    public function testAddFieldAsObject()
    {
        $a = new Attachment([
                                'fallback' => 'Fallback',
                                'text'     => 'Text'
                            ]);

        $f = new AttachmentField([
                                     'title' => 'Title 1',
                                     'value' => 'Value 1',
                                     'short' => TRUE
                                 ]);

        $a->addField($f);

        $fields = $a->getFields();

        $this->assertSame(1, count($fields));

        $this->assertSame($f, $fields[0]);
    }

    public function testSetFields()
    {
        $a = new Attachment([
                                'fallback' => 'Fallback',
                                'text'     => 'Text'
                            ]);

        $a->addField([
                         'title' => 'Title 1',
                         'value' => 'Value 1',
                         'short' => TRUE
                     ])->addField([
                                      'title' => 'Title 2',
                                      'value' => 'Value 2',
                                      'short' => TRUE
                                  ]);

        $this->assertSame(2, count($a->getFields()));

        $a->setFields([]);

        $this->assertSame(0, count($a->getFields()));
    }

}
