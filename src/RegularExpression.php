<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use function preg_match;
use function preg_match_all;
use function preg_replace;

/**
 * Represents a class wrapping a regular expression with common methods.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpression implements RegularExpressionInterface
{
	/**
	 * Represents the error message if a regular expression is invalid.
	 * @var string
	 */
	protected const ERROR_INVALID_REGULAR_EXPRESSION = 'The regular expression is invalid.';

	/**
	 * Represents the error message if a regular expression does not match.
	 * @var string
	 */
	protected const ERROR_REGULAR_EXPRESSION_NOT_MATCHING = 'The regular expression does not match.';

	/**
	 * Stores the plain regular expression.
	 * @var string
	 */
	private string $regularExpression;

	/**
	 * Constructor method.
	 * @param string $regularExpression The regular expression to wrap.
	 * @throws InvalidRegularExpressionException The regular expression is invalid.
	 */
	public function __construct( string $regularExpression )
	{
		$this->guard( $regularExpression );

		$this->regularExpression = $regularExpression;
	}

	/**
	 * Guards if the regular expression is syntactically valid.
	 * @param string $regularExpression The regular expression to guard.
	 * @throws InvalidRegularExpressionException The regular expression is invalid.
	 */
	private function guard( string $regularExpression ): void
	{
		if ( false === ( new RegularExpressionValidator() )->validate( $regularExpression ) )
		{
			throw new InvalidRegularExpressionException( static::ERROR_INVALID_REGULAR_EXPRESSION );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function match( string $subject, bool $throwNoMatchException, int $flags = 0, int $offset = 0 ): ?array
	{
		$matches = [];
		if ( 0 === @preg_match( $this->regularExpression, $subject, $matches, $flags, $offset ) )
		{
			if ( true === $throwNoMatchException )
			{
				throw new RegularExpressionNotMatchingException( static::ERROR_REGULAR_EXPRESSION_NOT_MATCHING );
			}

			return null;
		}

		return $matches;
	}

	/**
	 * {@inheritDoc}
	 */
	public function matchAll( string $subject, bool $throwNoMatchException, int $flags = 0, int $offset = 0 ): ?array
	{
		$matches = [];
		if ( 0 === @preg_match_all( $this->regularExpression, $subject, $matches, $flags, $offset ) )
		{
			if ( true === $throwNoMatchException )
			{
				throw new RegularExpressionNotMatchingException( static::ERROR_REGULAR_EXPRESSION_NOT_MATCHING );
			}

			return null;
		}

		return $matches;
	}

	/**
	 * {@inheritDoc}
	 */
	public function replace( string $replacement, string $subject, bool $throwNoMatchException, int $limit = -1, ?int &$count = null ): string
	{
		$pregReplaceResult = @preg_replace( $this->regularExpression, $replacement, $subject, $limit, $currentCount );
		if ( 0 === $currentCount && true === $throwNoMatchException )
		{
			throw new RegularExpressionNotMatchingException( static::ERROR_REGULAR_EXPRESSION_NOT_MATCHING );
		}

		return $pregReplaceResult;
	}
}
