<?php

namespace OliverKlee\Insecurity\Tests\Unit\Domain\Model;

use OliverKlee\Insecurity\Domain\Model\User;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    private $subject = null;

    /**
     * Sets up the test case.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->subject = new User();
    }

    /**
     * @test
     */
    public function getIdInitiallyReturnsZero()
    {
        self::assertSame(
            0,
            $this->subject->getId()
        );
    }

    /**
     * @test
     */
    public function setIdSetsId()
    {
        $this->subject->setId(123456);

        self::assertSame(
            123456,
            $this->subject->getId()
        );
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameSetsName()
    {
        $this->subject->setName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function getPasswordInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getPassword()
        );
    }

    /**
     * @test
     */
    public function setPasswordSetsPassword()
    {
        $this->subject->setPassword('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getPassword()
        );
    }

    /**
     * @test
     */
    public function getAdminInitiallyReturnsFalse()
    {
        self::assertFalse(
            $this->subject->getAdmin()
        );
    }

    /**
     * @test
     */
    public function setAdminSetsAdmin()
    {
        $this->subject->setAdmin(true);

        self::assertTrue(
            $this->subject->getAdmin()
        );
    }

    /**
     * @test
     */
    public function isAdminForNonAdminReturnsFalse()
    {
        $this->subject->setAdmin(false);

        self::assertFalse($this->subject->isAdmin());
    }

    /**
     * @test
     */
    public function isAdminForAdminReturnsTrue()
    {
        $this->subject->setAdmin(true);

        self::assertTrue($this->subject->isAdmin());
    }
}
