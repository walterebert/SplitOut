<?php

namespace SplitOut;

use SplitOut\Model\User;
use SplitOut\Model\ToBeAnnouncedUser;
use SplitOut\Model\Event;
use SplitOut\Model\Session;
use SplitOut\Model\Comment;

require __DIR__ . '/../src/autoload.php';

$arne = new User('Arne');
$stefan = new User('Stefan');
$sebastian = new User('Sebastian');

$phpUnconf = new Event('PHP Unconf EU');

$phpDays = new Session('PHP Days', new ToBeAnnouncedUser());

$phpDays->addPresenter($arne);
$phpDays->addPresenter($stefan);
$phpDays->addPresenter($sebastian);

$phpUnconf->addSession($phpDays);

$arnesComment = new Comment($arne, $phpDays, 'Awesome but is it secure?');

$phpDays->addComment($arnesComment);

var_dump($phpDays->getPresenters());

