<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use const PREG_OFFSET_CAPTURE;
use const PREG_PATTERN_ORDER;
use const PREG_SET_ORDER;
use const PREG_UNMATCHED_AS_NULL;

abstract class RegularExpressionMatchAllFlags
{
	/**
	 * Adds the appendant string offset to every match.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const OFFSET_CAPTURE = PREG_OFFSET_CAPTURE;

	/**
	 * Every unmatched subpattern will be returned as null.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const UNMATCHED_AS_NULL = PREG_UNMATCHED_AS_NULL;

	/**
	 * Orders the matches array in search pattern order.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const PATTERN_ORDER     = PREG_PATTERN_ORDER;

	/**
	 * Orders the array in sets of pattern matches.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 * @var int
	 */
	public const SET_ORDER         = PREG_SET_ORDER;
}
