<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\InvalidLimitExceptionInterface;
use CodeKandis\RegularExpressions\RegularExpressionInterface;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithInvalidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithMatchingSubjectReplacementValidLimitExpectedReplacedCountAndExpectedReplaceMethodResultDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchAllMethodResultDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchMethodResultDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithNonMatchingSubjectValidFlagsAndValidOffsetDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithNonMatchingSubjectValidFlagsValidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithNonMatchingSubjectValidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest\RegularExpressionsWithSubjectValidFlagsInvalidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider;
use CodeKandis\Types\OffsetOutOfRangeExceptionInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case to test the `CodeKandis\RegularExpressions\RegularExpressionInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionInterfaceTest extends TestCase
{
	/**
	 * Tests if `RegularExpressionInterface::match()` throws a `CodeKandis\RegularExpression\OffsetOutOfRangeExceptionInterface` on an invalid offset.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $subject The subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $invalidOffset The invalid offset to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithSubjectValidFlagsInvalidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodMatchThrowsOffsetOutOfRangeExceptionInterfaceOnInvalidOffset( RegularExpressionInterface $regularExpression, string $subject, int $validFlags, int $invalidOffset, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->match( $subject, true, $validFlags, $invalidOffset );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( OffsetOutOfRangeExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::match()` throws a `CodeKandis\RegularExpression\RegularExpressionNotMatchingExceptionInterface` if a regular expression does not match.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $nonMatchingSubject The non-matching subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithNonMatchingSubjectValidFlagsValidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodMatchThrowsRegularExpressionNotMatchingExceptionInterfaceOnNonMatchingSubject( RegularExpressionInterface $regularExpression, string $nonMatchingSubject, int $validFlags, int $validOffset, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->match( $nonMatchingSubject, true, $validFlags, $validOffset );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( RegularExpressionNotMatchingExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::match()` returns null if a regular expression does not match.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $nonMatchingSubject The non-matching subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 */
	#[DataProviderExternal( RegularExpressionsWithNonMatchingSubjectValidFlagsAndValidOffsetDataProvider::class, 'provideData' )]
	public function testIfMethodMatchReturnsNullOnNonMatchingSubject( RegularExpressionInterface $regularExpression, string $nonMatchingSubject, int $validFlags, int $validOffset ): void
	{
		$methodResult = $regularExpression->match( $nonMatchingSubject, false, $validFlags, $validOffset );

		static::assertNull( $methodResult );
	}

	/**
	 * Tests if `RegularExpressionInterface::match()` returns the matching result correctly.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $matchingSubject The matching subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 * @param array $expectedMatchMethodResult The expected match method result.
	 */
	#[DataProviderExternal( RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchMethodResultDataProvider::class, 'provideData' )]
	public function testIfMethodMatchReturnsMatchingResultCorrectly( RegularExpressionInterface $regularExpression, string $matchingSubject, int $validFlags, int $validOffset, array $expectedMatchMethodResult ): void
	{
		$methodResult = $regularExpression->match( $matchingSubject, true, $validFlags, $validOffset );

		static::assertSame( $expectedMatchMethodResult, $methodResult );
	}

	/**
	 * Tests if `RegularExpressionInterface::matchAll()` throws a `CodeKandis\RegularExpression\OffsetOutOfRangeExceptionInterface` on an invalid offset.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $subject The subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $invalidOffset The invalid offset to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithSubjectValidFlagsInvalidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodMatchAllThrowsOffsetOutOfRangeExceptionInterfaceOnInvalidOffset( RegularExpressionInterface $regularExpression, string $subject, int $validFlags, int $invalidOffset, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->matchAll( $subject, true, $validFlags, $invalidOffset );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( OffsetOutOfRangeExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::matchAll()` throws a `CodeKandis\RegularExpression\RegularExpressionNotMatchingExceptionInterface` if a regular expression does not match.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $nonMatchingSubject The non-matching subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithNonMatchingSubjectValidFlagsValidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodMatchAllThrowsRegularExpressionNotMatchingExceptionInterfaceOnNonMatchingSubject( RegularExpressionInterface $regularExpression, string $nonMatchingSubject, int $validFlags, int $validOffset, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->matchAll( $nonMatchingSubject, true, $validFlags, $validOffset );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( RegularExpressionNotMatchingExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::matchAll()` returns null if a regular expression does not match.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $nonMatchingSubject The non-matching subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 */
	#[DataProviderExternal( RegularExpressionsWithNonMatchingSubjectValidFlagsAndValidOffsetDataProvider::class, 'provideData' )]
	public function testIfMethodMatchAllReturnsNullOnNonMatchingSubject( RegularExpressionInterface $regularExpression, string $nonMatchingSubject, int $validFlags, int $validOffset ): void
	{
		$methodResult = $regularExpression->matchAll( $nonMatchingSubject, false, $validFlags, $validOffset );

		static::assertNull( $methodResult );
	}

	/**
	 * Tests if `RegularExpressionInterface::matchAll()` returns the matching result correctly.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $matchingSubject The subject to pass.
	 * @param int $validFlags The valid search options to pass.
	 * @param int $validOffset The valid offset to pass.
	 * @param array $expectedMatchAllMethodResult The expected match all method result.
	 */
	#[DataProviderExternal( RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchAllMethodResultDataProvider::class, 'provideData' )]
	public function testIfMethodMatchAllReturnsMatchingResultCorrectly( RegularExpressionInterface $regularExpression, string $matchingSubject, int $validFlags, int $validOffset, array $expectedMatchAllMethodResult ): void
	{
		$methodResult = $regularExpression->matchAll( $matchingSubject, true, $validFlags, $validOffset );

		static::assertSame( $expectedMatchAllMethodResult, $methodResult );
	}

	/**
	 * Tests if `RegularExpressionInterface::replace()` throws a `CodeKandis\RegularExpression\InvalidLimitExceptionInterface` on an invalid limit.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param int $invalidLimit The invalid limit to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithInvalidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodReplaceThrowsInvalidLimitExceptionInterfaceOnInvalidLimit( RegularExpressionInterface $regularExpression, int $invalidLimit, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->replace( '', '', true, $invalidLimit );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InvalidLimitExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::replace()` throws a `CodeKandis\RegularExpression\RegularExpressionNotMatchingExceptionInterface` if a regular expression does not match.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $nonMatchingSubject The non-matching subject to pass.
	 * @param int $validLimit The valid limit to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionsWithNonMatchingSubjectValidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfMethodReplaceThrowsRegularExpressionNotMatchingExceptionInterfaceOnNonMatchingSubject( RegularExpressionInterface $regularExpression, string $nonMatchingSubject, int $validLimit, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			$regularExpression->replace( $nonMatchingSubject, '', true, $validLimit );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( RegularExpressionNotMatchingExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpressionInterface::replace()` returns the replaced result correctly.
	 * @param RegularExpressionInterface $regularExpression The regular expression to test.
	 * @param string $matchingSubject The matching subject to pass.
	 * @param string $replacement The replacement to pass.
	 * @param int $validLimit The search options to pass.
	 * @param int $expectedReplacedCount The expected replaced count.
	 * @param string $expectedReplaceMethodResult The expected replace method result.
	 */
	#[DataProviderExternal( RegularExpressionsWithMatchingSubjectReplacementValidLimitExpectedReplacedCountAndExpectedReplaceMethodResultDataProvider::class, 'provideData' )]
	public function testIfMethodReplaceReturnsReplacedResultCorrectly( RegularExpressionInterface $regularExpression, string $matchingSubject, string $replacement, int $validLimit, int $expectedReplacedCount, string $expectedReplaceMethodResult ): void
	{
		$resultedReplacedCount = null;
		$methodResult          = $regularExpression->replace( $matchingSubject, $replacement, true, $validLimit, $resultedReplacedCount );

		static::assertSame( $expectedReplacedCount, $resultedReplacedCount );
		static::assertSame( $expectedReplaceMethodResult, $methodResult );
	}
}
