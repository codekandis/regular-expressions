<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InvalidRegularExpressionExceptionTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\InvalidRegularExpressionException;
use CodeKandis\RegularExpressions\Tests\Fixtures\InvalidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with invalid regular expression, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithInvalidRegularExpressionExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = InvalidRegularExpressionException::class,
				'invalidRegularExpression'   => $invalidRegularExpression = InvalidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => sprintf( InvalidRegularExpressionException::EXCEPTION_MESSAGE_INVALID_REGULAR_EXPRESSION, $invalidRegularExpression )
			]
		];
	}
}
