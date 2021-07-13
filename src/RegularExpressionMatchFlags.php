<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use const PREG_OFFSET_CAPTURE;
use const PREG_UNMATCHED_AS_NULL;

abstract class RegularExpressionMatchFlags
{
	/**
	 * Adds the appendant string offset to every match.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const OFFSET_CAPTURE    = PREG_OFFSET_CAPTURE;

	/**
	 * Every unmatched subpattern will be returned as null.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const UNMATCHED_AS_NULL = PREG_UNMATCHED_AS_NULL;
}
