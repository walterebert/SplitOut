<?php

namespace SplitOut\Model;

class SessionTest extends \PHPUnit_Framework_TestCase {
    protected $userA;
    protected $userB;
    protected $session;

    /**
     * @covers Session::addPresenter
     * @covers Session::getPresenters
     */
    public function testAddingPresentersToASessionWorks()
    {
        $this->setUpSessionWithTwoPresenters();

        $this->assertContains($this->userA, $this->session->getPresenters());
        $this->assertContains($this->userB, $this->session->getPresenters());
    }

    /**
     * @covers  Session::removePresenter
     * @depends testAddingPresentersToASessionWorks
     */
    public function testRemovingAPresenterFromASessionWorks()
    {
        $this->setUpSessionWithTwoPresenters();

        $this->session->removePresenter($this->userA);
        $this->session->removePresenter($this->userB);

        $this->assertNotContains($this->userA, $this->session->getPresenters());
        $this->assertNotContains($this->userB, $this->session->getPresenters());
    }

    protected function setUpSessionWithTwoPresenters()
    {
        $this->userA = $this->getMockBuilder('SplitOut\Model\User')
                            ->disableOriginalConstructor()
                            ->getMock();

        $this->userB = $this->getMockBuilder('SplitOut\Model\User')
                            ->disableOriginalConstructor()
                            ->getMock();

        $this->session = new Session;

        $this->session->addPresenter($this->userA);
        $this->session->addPresenter($this->userB);
    }
}
