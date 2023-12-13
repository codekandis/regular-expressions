<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use LogicException;
use Override;
use function sprintf;

/**
 * Represents an exception if a regular expression is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidRegularExpressionException extends LogicException implements InvalidRegularExpressionExceptionInterface
{
	/**
	 * Represents the error message if a regular expression is invalid.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_INVALID_REGULAR_EXPRESSION = 'The regular expression `%s` is invalid.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_invalidRegularExpression( string $invalidRegularExpression ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_INVALID_REGULAR_EXPRESSION, $invalidRegularExpression )
		);
	}
}
