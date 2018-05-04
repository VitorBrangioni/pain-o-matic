<?php

namespace src\app;

use src\enum\TypeMessage;

class UserMessage
{ 
    private $type;
    private $title;
    private $message;

    public function __construct(TypeMessage $typeMessage, string $title, string $message)
    {
        $this->setType($typeMessage);
        $this->setTitle($title);
        $this->setMessage($message);
    }

    public function add()
    {
        self::addMessage($this->type, $this->title, $this->message);
    }

    public static function addMessage(TypeMessage $typeMessage, string $title, string $message)
    {
        $_SESSION['user-message']['type'] = $typeMessage->getValue();
        $_SESSION['user-message']['title'] = $title;
        $_SESSION['user-message']['msg'] = $message;
    }

    public function setType(TypeMessage $typeMessage)
    {
        $this->type = $typeMessage;
    }

    public function getType() : TypeMessage
    {
        return $this->type;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

}