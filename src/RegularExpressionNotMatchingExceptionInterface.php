<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any exception if a regular expression does not match.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RegularExpressionNotMatchingExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $regularExpression The regular expression which does not match.
	 */
	public static function with_regularExpression( string $regularExpression ): static;
}
