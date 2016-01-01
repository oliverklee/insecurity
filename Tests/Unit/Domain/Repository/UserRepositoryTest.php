<?php
namespace OliverKlee\Insecurity\Tests\Unit\Domain\Repository;

use OliverKlee\Insecurity\Domain\Repository\UserRepository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Cleans up.
     *
     * @return void
     */
    protected function tearDown()
    {
        UserRepository::purgeInstance();
    }

    /**
     * @test
     */
    public function getInstanceReturnsInstanceOfTestedClass()
    {
        self::assertInstanceOf(UserRepository::class, UserRepository::getInstance());
    }

    /**
     * @test
     */
    public function getInstanceCalledTwoTimesReturnsSameInstance()
    {
        self::assertSame(UserRepository::getInstance(), UserRepository::getInstance());
    }

    /**
     * @test
     */
    public function purgeInstancePurgesSingletonInstance()
    {
        $firstInstance = UserRepository::getInstance();

        UserRepository::purgeInstance();

        $secondInstance = UserRepository::getInstance();

        self::assertNotSame($firstInstance, $secondInstance);
    }
}
