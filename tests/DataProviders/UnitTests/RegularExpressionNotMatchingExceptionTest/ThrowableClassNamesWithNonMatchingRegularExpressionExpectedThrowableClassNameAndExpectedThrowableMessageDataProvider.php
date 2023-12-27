<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionNotMatchingExceptionTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingException;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with non-matching regular expression, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithNonMatchingRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = RegularExpressionNotMatchingException::class,
				'regularExpression'          => $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			]
		];
	}
}
