<?php

namespace Socieboy\Newsletter\Subscriber;

use Mailchimp;

class SubscriberList implements SubscriberInterface
{

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
     * Subscribe a user to a list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function subscribe($listName, $email)
    {
        return $this->mailchimp->lists->subscribe(
            $this->lists[$listName],
            ['email' => $email],
            null,   // merge vars
            'html', // format email
            false,  // reuire double
            true   // update existing customers
        );
    }

    /**
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribe($listName, $email)
    {
        return $this->mailchimp->lists->unsubscribe(
            $this->lists[$listName],
            ['email' => $email],
            false,   // delete email permanentky
            false,  // send a goob bye email?
            false  // send unsubscribe notification email?
        );
    }

}