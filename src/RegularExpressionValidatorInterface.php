<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any regular expression validator.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RegularExpressionValidatorInterface
{
	/**
	 * Determines if the regular expression is syntactically valid.
	 * @param string $regularExpression The regular expression to validate.
	 * @return bool True if the regular expression is valid, false otherwise.
	 */
	public function validate( string $regularExpression ): bool;
}
