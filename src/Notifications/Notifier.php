<?php namespace Socieboy\Newsletter\Notifications;

use Mailchimp;

class Notifier implements NotifierInterface{

    /**
     * Unique ID for list on Mailchimp
     * @var array
     */
    protected $lists;

    /**
     * @var Mailchimp
     */
    protected $mailchimp;

    /**
     * @param $mailchimp
     */
    function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
        $this->lists = config('newsletter.lists');
    }

    /**
     * @param $title
     * @param $body
     */
    public function notify($title, $body, $listName)
    {
        $options = [
            'list_id' => $this->lists[$listName],
            'subject' => $title,
            'from_name' => getenv('MAILCHIMP_FROM_NAME'),
            'from_email' => getenv('MAILCHIMP_FROM_EMAIL'),
            'to_name' => getenv('MAILCHIMP_TO_NAME'),
        ];

        $content = [
            'html' => $body,
            'text' => strip_tags($body)
        ];

        $campaing = $this->mailchimp->campaigns->create('regular', $options, $content);

        $this->mailchimp->campaigns->send($campaing['id']);
    }
}