<?php

namespace SplitOut\Model;

class SessionTest extends \PHPUnit_Framework_TestCase {
    protected $userA;
    protected $userB;
    protected $session;

    /**
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
     * @expectedException SplitOut\Model\SessionException
     */
    public function testUsingEmptyTitleThrowsException() {

        $user = $this->getMockBuilder('SplitOut\Model\Presenter')
                     ->getMock();

        $session = new Session('', $user);
    }

    /**
     * @expectedException SplitOut\Model\SessionException
     */
    public function testUsingNonStringTitleThrowsException() {

        $user = $this->getMockBuilder('SplitOut\Model\Presenter')
                     ->getMock();

        $session = new Session(array(), $user);
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
}
