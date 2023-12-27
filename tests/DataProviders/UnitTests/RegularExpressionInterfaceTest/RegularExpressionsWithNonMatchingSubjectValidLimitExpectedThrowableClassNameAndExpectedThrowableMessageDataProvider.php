<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingException;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing regular expressions with non-matching subject, valid limit, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithNonMatchingSubjectValidLimitExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validLimit'                 => 1,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			],
			1 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validLimit'                 => 1,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			]
		];
	}
}
