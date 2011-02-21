<?php

namespace SplitOut\Model;

class Comment {

    protected $author;
    protected $session;
    protected $text;

    public function __construct(User $author, Session $session, $text)
    {
        $this->author = $author;
        $this->session = $session;
        $this->text = $text;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getSession()
    {
        return $this->session;
    }
    
    public function getText()
    {
        return $this->text;
    }
}
