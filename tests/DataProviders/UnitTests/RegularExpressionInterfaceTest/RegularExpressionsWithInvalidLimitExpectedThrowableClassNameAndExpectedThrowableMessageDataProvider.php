<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\InvalidLimitException;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing regular expressions with invalid limit, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithInvalidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'          => new RegularExpression( ValidValues::SIMPLE_REGULAR_EXPRESSION ),
				'invalidLimit'               => $invalidLimit = -2,
				'expectedThrowableClassName' => InvalidLimitException::class,
				'expectedThrowableMessage'   => sprintf( InvalidLimitException::EXCEPTION_MESSAGE_INVALID_LIMIT, $invalidLimit )
			],
			1 => [
				'regularExpression'          => new RegularExpression( ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'invalidLimit'               => $invalidLimit = -2,
				'expectedThrowableClassName' => InvalidLimitException::class,
				'expectedThrowableMessage'   => sprintf( InvalidLimitException::EXCEPTION_MESSAGE_INVALID_LIMIT, $invalidLimit )
			]
		];
	}
}
