<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use LogicException;
use Override;
use function sprintf;

/**
 * Represents an exception if a regular expression does not match.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionNotMatchingException extends LogicException implements RegularExpressionNotMatchingExceptionInterface
{
	/**
	 * Represents the error message if a regular expression does not match.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING = 'The regular expression `%s` does not match.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_regularExpression( string $regularExpression ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
		);
	}
}
