<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\InvalidOffsetExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InvalidOffsetExceptionInterfaceTest\ThrowableClassNamesWithInvalidOffsetSubjectLengthExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of `CodeKandis\RegularExpressions\InvalidOffsetExceptionInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidOffsetExceptionInterfaceTest extends TestCase
{
	/**
	 * Tests if `InvalidOffsetExceptionInterface::with_invalidOffsetAndSubjectLength()` instantiates the throwable correctly.
	 * @param string $throwableClassName The class name of the throwable to test.
	 * @param int $invalidOffset The invalid offset to pass.
	 * @param int $subjectLength The subject length to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( ThrowableClassNamesWithInvalidOffsetSubjectLengthExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodWithInvalidOffsetAndSubjectLengthInstantiatesThrowableCorrectly( string $throwableClassName, int $invalidOffset, int $subjectLength, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		$resultedThrowable          = $throwableClassName::{'with_invalidOffsetAndSubjectLength'}( $invalidOffset, $subjectLength );
		$resultedThrowableClassName = $resultedThrowable::class;
		$resultedThrowableMessage   = $resultedThrowable->getMessage();

		static::assertInstanceOf( InvalidOffsetExceptionInterface::class, $resultedThrowable );
		static::assertSame( $expectedThrowableClassName, $resultedThrowableClassName );
		static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
	}
}
