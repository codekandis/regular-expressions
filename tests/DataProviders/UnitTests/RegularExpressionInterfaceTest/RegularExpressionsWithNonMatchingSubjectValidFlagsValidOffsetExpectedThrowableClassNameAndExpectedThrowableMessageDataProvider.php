<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionMatchFlag;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingException;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing regular expressions with non-matching subject, valid flags, valid offset, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithNonMatchingSubjectValidFlagsValidOffsetExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validFlags'                 => RegularExpressionMatchFlag::None->value,
				'validOffset'                => 0,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			],
			1 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validFlags'                 => RegularExpressionMatchFlag::OffsetCapture->value,
				'validOffset'                => 0,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			],
			2 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validFlags'                 => RegularExpressionMatchFlag::UnmatchedAsNull->value,
				'validOffset'                => 0,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			],
			3 => [
				'regularExpression'          => new RegularExpression( $regularExpression = ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject'         => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validFlags'                 => RegularExpressionMatchFlag::OffsetCapture->value | RegularExpressionMatchFlag::UnmatchedAsNull->value,
				'validOffset'                => 0,
				'expectedThrowableClassName' => RegularExpressionNotMatchingException::class,
				'expectedThrowableMessage'   => sprintf( RegularExpressionNotMatchingException::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
			]
		];
	}
}
