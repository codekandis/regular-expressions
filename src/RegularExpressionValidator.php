<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use Override;
use function preg_match;

/**
 * Represents a regular expression validator.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionValidator implements RegularExpressionValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function validate( string $regularExpression ): bool
	{
		return false !== @preg_match( $regularExpression, '' );
	}
}
