<?php

namespace Socieboy\Newsletter\Groups;

use Mailchimp;

class GroupList implements GroupListInterface{


    /**
     * Unique ID for list on MailChimp
     *
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
     * Create a new interest group.
     *
     * @param $list
     * @param $name
     * @return \associative_array
     */
    public function group($list, $name)
    {
        return $this->mailChimp->lists->interestGroupAdd(
            $this->lists[$list],    // List ID
            $name                   // Group name
        );
    }

    /**
     * Create a grouping
     *
     * @param $list
     * @param $name
     * @param $groups
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

    /**
     * Return true if the grouping already exists.
     *
     * @param $list
     * @param $name
     * @return bool
     */
    public function has($list, $name)
    {
        try{

            $groupings = $this->mailChimp->lists->interestGroupings(
                $this->lists[$list]
            );

            foreach($groupings as $grouping)
            {
                if($grouping['name'] == $name)
                {
                    return true;
                }

                return false;
            }
        }
        catch(\Mailchimp_List_InvalidOption $e){
            return false;
        }

    }

} 