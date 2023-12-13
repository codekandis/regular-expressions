<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use CodeKandis\Types\InvalidValueException;
use function sprintf;

/**
 * Represents an exception if a regular expression is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidRegularExpressionException extends InvalidValueException implements InvalidRegularExpressionExceptionInterface
{
	/**
	 * Represents the exception message if a regular expression is invalid.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_INVALID_REGULAR_EXPRESSION = 'The regular expression `%s` is invalid.';

	/**
	 * Static constructor method.
	 * @param string $invalidRegularExpression The regular expression which is invalid.
	 * @return static
	 */
	public static function with_invalidRegularExpression( string $invalidRegularExpression ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_INVALID_REGULAR_EXPRESSION, $invalidRegularExpression )
		);
	}
}
