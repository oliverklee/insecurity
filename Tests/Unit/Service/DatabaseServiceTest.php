<?php

namespace OliverKlee\Insecurity\Tests\Unit\Service;

use OliverKlee\Insecurity\Service\DatabaseService;
use PHPUnit\Framework\TestCase;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class DatabaseServiceTest extends TestCase
{
    /**
     * Cleans up.
     *
     * @return void
     */
    protected function tearDown(): void
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
