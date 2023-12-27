<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingException;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionNotMatchingExceptionTest\ThrowableClassNamesWithNonMatchingRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\RegularExpressions\RegularExpressionNotMatchingExceptionInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionNotMatchingExceptionTest extends TestCase
{
	/**
	 * Tests if `RegularExpressionNotMatchingExceptionInterface::with_nonMatchingRegularExpression()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param string $regularExpression The regular expression to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithNonMatchingRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithRegularExpressionInstantiatesThrowableCorrectly( string $throwableClassName, string $regularExpression, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		/**
		 * @var RegularExpressionNotMatchingException $throwableClassName
		 */
		$resultedThrowable          = $throwableClassName::with_nonMatchingRegularExpression( $regularExpression );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( RegularExpressionNotMatchingExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
