<?php

namespace Socieboy\Newsletter\Notifications;

use Mailchimp;

class Notifier implements NotifierInterface
{

    /**
     * Unique ID for list on MailChimp
     * @var array
     */
    protected $lists;

    /**
     * @var $mailChimp
     */
    protected $mailChimp;

    /**
     * @param $mailChimp
     */
    function __construct(Mailchimp $mailChimp)
    {
        $this->mailChimp = $mailChimp;
        $this->lists = config('newsletter.lists');
    }

    /**
     * @param      $title
     * @param      $body
     * @param      $list
     */
    public function notify($title, $body, $list)
    {
        $options = [
            'list_id' => $this->lists[$list],
            'subject' => $title,
            'from_name' => env('MAILCHIMP_FROM_NAME', ''),
            'from_email' => env('MAILCHIMP_FROM_EMAIL', ''),
            'to_name' => env('MAILCHIMP_TO_NAME', ''),
        ];

        $content = [
            'html' => $body,
            'text' => strip_tags($body)
        ];

        $campaign = $this->mailChimp->campaigns->create('regular', $options, $content);

        $this->mailChimp->campaigns->send($campaign['id']);
    }

    public function notifyToGroup($title, $body, $list, $group)
    {
        $this->mailChimp->campaigns->segmentTest();
    }
}