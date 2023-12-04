<?php

namespace PimDataPostBundle\Lib\FailureNotificationSender;

interface IFailureNotificationSender
{
    public function SendFailureNotification(): void;
}