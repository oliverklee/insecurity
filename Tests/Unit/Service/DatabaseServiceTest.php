<?php

namespace OliverKlee\Insecurity\Tests\Unit\Service;

use OliverKlee\Insecurity\Service\DatabaseService;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class DatabaseServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Cleans up.
     *
     * @return void
     */
    protected function tearDown()
    {
        DatabaseService::purgeInstance();
    }

    /**
     * @test
     */
    public function getInstanceReturnsInstanceOfTestedClass()
    {
        self::assertInstanceOf(DatabaseService::class, DatabaseService::getInstance());
    }

    /**
     * @test
     */
    public function getInstanceCalledTwoTimesReturnsSameInstance()
    {
        self::assertSame(DatabaseService::getInstance(), DatabaseService::getInstance());
    }

    /**
     * @test
     */
    public function purgeInstancePurgesSingletonInstance()
    {
        $firstInstance = DatabaseService::getInstance();

        DatabaseService::purgeInstance();

        $secondInstance = DatabaseService::getInstance();
        self::assertNotSame($firstInstance, $secondInstance);
    }
}
