<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\InvalidRegularExpressionExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InvalidRegularExpressionExceptionInterfaceTest\ThrowableClassNamesWithInvalidRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\RegularExpressions\InvalidRegularExpressionExceptionInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidRegularExpressionExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if `InvalidRegularExpressionExceptionInterface::with_regularExpression()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $invalidRegularExpression The invalid regular expression to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithInvalidRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithRegularExpressionInstantiatesThrowableCorrectly( string $throwableClassName, string $invalidRegularExpression, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_invalidRegularExpression'}( $invalidRegularExpression );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( InvalidRegularExpressionExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
