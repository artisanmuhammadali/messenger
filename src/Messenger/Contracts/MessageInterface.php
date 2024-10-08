<?php

namespace ArtisanAli\Messenger\Contracts;

interface MessageInterface
{
    public function sender();
    public function thread();
    public function scopeFromSender($query, $sender);
}
