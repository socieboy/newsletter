<?php

namespace Socieboy\Newsletter\Groups;

interface GroupListInterface
{
    public function group($list, $name);

    public function grouping($list, $name, $groups);

    public function has($list, $name);
} 