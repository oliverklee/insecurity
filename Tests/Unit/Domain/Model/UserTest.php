<?php

namespace OliverKlee\Insecurity\Tests\Unit\Domain\Model;

use OliverKlee\Insecurity\Domain\Model\User;
use PHPUnit\Framework\TestCase;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class UserTest extends TestCase
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
    protected function setUp(): void
    {
        $this->subject = new User();
    }

    /**
     * @test
     */
    public function getIdInitiallyReturnsZero()
    {
        self::assertSame(0, $this->subject->getId());
    }

    /**
     * @test
     */
    public function setIdSetsId()
    {
        $id = 123456;

        $this->subject->setId($id);

        self::assertSame($id, $this->subject->getId());
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString()
    {
        self::assertSame('', $this->subject->getName());
    }

    /**
     * @test
     */
    public function setNameSetsName()
    {
        $name = 'foo bar';

        $this->subject->setName($name);

        self::assertSame($name, $this->subject->getName());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame('', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
    {
        $email = 'jane@example.com';

        $this->subject->setEmail($email);

        self::assertSame($email, $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getPasswordInitiallyReturnsEmptyString()
    {
        self::assertSame('', $this->subject->getPassword());
    }

    /**
     * @test
     */
    public function setPasswordSetsPassword()
    {
        $password = 'nöiouqv3tw4';

        $this->subject->setPassword($password);

        self::assertSame($password, $this->subject->getPassword());
    }

    /**
     * @test
     */
    public function getAdminInitiallyReturnsFalse()
    {
        self::assertFalse($this->subject->getAdmin());
    }

    /**
     * @test
     */
    public function setAdminSetsAdmin()
    {
        $this->subject->setAdmin(true);

        self::assertTrue($this->subject->getAdmin());
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
