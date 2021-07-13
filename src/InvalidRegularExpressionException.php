<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use LogicException;

/**
 * Represents an exception if a regular expression is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidRegularExpressionException extends LogicException
{
}
