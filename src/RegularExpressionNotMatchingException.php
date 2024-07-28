<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use CodeKandis\Types\LogicException;
use function sprintf;

/**
 * Represents an exception if a regular expression does not match.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionNotMatchingException extends LogicException implements RegularExpressionNotMatchingExceptionInterface
{
	/**
	 * Represents the exception message if a regular expression does not match.
	 */
	public const string EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING = 'The regular expression `%s` does not match.';

	/**
	 * Static constructor method.
	 * @param string $regularExpression The regular expression which does not match.
	 * @return static
	 */
	public static function with_nonMatchingRegularExpression( string $regularExpression ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_REGULAR_EXPRESSION_NOT_MATCHING, $regularExpression )
		);
	}
}
