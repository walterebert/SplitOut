<?php

namespace SplitOut\Model;

class SessionTest extends \PHPUnit_Framework_TestCase {
    protected $userA;
    protected $userB;
    protected $commentA;
    protected $commentB;
    protected $session;

    /**
     * @covers SplitOut\Model\Session::__construct
     * @covers SplitOut\Model\Session::addPresenter
     * @covers SplitOut\Model\Session::getPresenters
     */
    public function testAddingPresentersToASessionWorks()
    {
        $this->setUpSessionWithTwoPresenters();

        $this->assertContains($this->userA, $this->session->getPresenters());
        $this->assertContains($this->userB, $this->session->getPresenters());
    }

    /**
     * @covers SplitOut\Model\Session::__construct
     * @covers  SplitOut\Model\Session::removePresenter
     * @depends testAddingPresentersToASessionWorks
     */
    public function testRemovingAPresenterFromASessionWorks()
    {
        $this->setUpSessionWithTwoPresenters();

        $this->session->removePresenter($this->userA);

        $this->assertNotContains($this->userA, $this->session->getPresenters());
        $this->assertContains($this->userB, $this->session->getPresenters());
    }

    /**
     * @covers SplitOut\Model\Session::addComment
     * @covers SplitOut\Model\Session::getComments
     */
    public function testAddingCommentsWorks()
    {
        $this->setUpSessionWithTwoComments();

        $this->assertContains($this->commentA, $this->session->getComments());
        $this->assertContains($this->commentB, $this->session->getComments());
    }

    /**
     * @covers SplitOut\Model\Session::__construct
     * @expectedException SplitOut\Model\SessionException
     */
    public function testUsingEmptyTitleThrowsException() {

        $user = $this->getMockBuilder('SplitOut\Model\Presenter')
                     ->getMock();

        $session = new Session('', $user);
    }

    /**
     * @covers SplitOut\Model\Session::__construct
     * @expectedException SplitOut\Model\SessionException
     */
    public function testUsingNonStringTitleThrowsException() {

        $user = $this->getMockBuilder('SplitOut\Model\Presenter')
                     ->getMock();

        $session = new Session(array(), $user);
    }
    
    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testAddingToBeAnnouncedUserGeneratesError()
    {
        $user = $this->getMockBuilder('SplitOut\Model\ToBeAnnouncedUser')
                     ->getMock();

        $session = new Session('test', $user);
        $session->addPresenter($user);
    }

    public function testAddingPresenterOverwritesToBeAnnouncedUser()
    {
        $user = $this->getMockBuilder('SplitOut\Model\ToBeAnnouncedUser')
                     ->getMock();

        $presenter = $this->getMockBuilder('SplitOut\Model\Presenter')
                          ->getMock();

        $session = new Session('test', $presenter);
        $session->addPresenter($user);

var_dump($session);
    }

    protected function setUpSessionWithTwoPresenters()
    {
        $this->userA = $this->getMockBuilder('SplitOut\Model\Presenter')
                            ->getMock();

        $this->userB = $this->getMockBuilder('SplitOut\Model\User')
                            ->disableOriginalConstructor()
                            ->getMock();

        $this->session = new Session('test', $this->userA);
        $this->session->addPresenter($this->userB);
    }

    protected function setUpSessionWithTwoComments()
    {
        $this->userA = $this->getMockBuilder('SplitOut\Model\Presenter')
                            ->getMock();

        $this->commentA = $this->getMockBuilder('SplitOut\Model\Comment')
                               ->disableOriginalConstructor()
                               ->getMock();

        $this->commentB = $this->getMockBuilder('SplitOut\Model\Comment')
                               ->disableOriginalConstructor()
                               ->getMock();

        $this->session = new Session('test', $this->userA);
        $this->session->addComment($this->commentA);
        $this->session->addComment($this->commentB);
    }
}
