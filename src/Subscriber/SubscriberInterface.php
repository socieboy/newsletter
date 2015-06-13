<?php

namespace Socieboy\Newsletter\Subscriber;

interface SubscriberInterface
{

    /**
     * @param $list
     * @param $email
     * @return mixed
     */
    public function subscribe($list, $email);

    /**
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribe($list, $email);
}