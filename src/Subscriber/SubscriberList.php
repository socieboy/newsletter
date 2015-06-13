<?php

namespace Socieboy\Newsletter\Subscriber;

use Mailchimp;

class SubscriberList implements SubscriberInterface
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
     * Subscribe a user to a list
     *
     * @param $list
     * @param $email
     * @param $options
     * @return mixed
     */
    public function subscribe($list, $email, $options = null)
    {

        return $this->mailChimp->lists->subscribe(
            $this->lists[$list],    // List ID
            ['email' => $email],    // Email to subscribe
            $options,               // Options
            'html',                 // Format email
            false,                  // Require double
            true                   // Update existing customers
        );
    }

    /**
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribe($list, $email)
    {
        return $this->mailChimp->lists->unsubscribe(
            $this->lists[$list],    // List ID
            ['email' => $email],    // Email Subscribed
            false,                  // Delete email permanently
            false,                  // Send a good bye email?
            false                  // Send un subscribe notification email?
        );
    }


    /**
     * Create a new interest group.
     *
     * @param $list
     * @param $name
     * @return \associative_array
     */
    public function group($list, $name)
    {
        return $this->mailChimp->lists->interestGroupAdd($this->lists[$list], $name);
    }

    /**
     * Create a grouping
     *
     * @param $list
     * @param $name
     * @param $groups
     *
     * @return \associative_array
     */
    public function grouping($list, $name, $groups)
    {
        return $this->mailChimp->lists->interestGroupingAdd(
            $this->lists[$list],    // List ID
            $name,                  // Grouping name
            'checkboxes',           // Type "checkboxes"
            $groups
        );
    }

}