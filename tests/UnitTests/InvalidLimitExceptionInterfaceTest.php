<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\InvalidLimitExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InvalidLimitExceptionInterfaceTest\ThrowableClassNamesWithInvalidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\RegularExpressions\InvalidLimitExceptionInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidLimitExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if `InvalidLimitExceptionInterface::with_invalidLimit()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param int $invalidLimit The invalid limit to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithInvalidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithInvalidOffsetAndSubjectLengthInstantiatesThrowableCorrectly( string $throwableClassName, int $invalidLimit, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_invalidLimit'}( $invalidLimit );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( InvalidLimitExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
