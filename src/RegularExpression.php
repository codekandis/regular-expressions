<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use CodeKandis\Types\OffsetOutOfRangeException;
use Override;
use function abs;
use function preg_match;
use function preg_match_all;
use function preg_replace;
use function strlen;

/**
 * Represents a class wrapping a regular expression with common methods.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpression implements RegularExpressionInterface
{
	/**
	 * Stores the plain regular expression.
	 * @var string
	 */
	private readonly string $regularExpression;

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
	 * @throws InvalidRegularExpressionExceptionInterface The regular expression is invalid.
	 */
	private function guard( string $regularExpression ): void
	{
		if ( false === ( new RegularExpressionValidator() )->validate( $regularExpression ) )
		{
			throw InvalidRegularExpressionException::with_invalidRegularExpression( $regularExpression );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function match( string $subject, bool $throwNoMatchException = true, int $flags = RegularExpressionMatchFlag::None->value, int $offset = 0 ): ?array
	{
		$subjectLength = strlen( $subject );
		if ( $subjectLength < abs( $offset ) )
		{
			throw OffsetOutOfRangeException::with_outOfRangeOffsetExpectedMinOffsetAndExpectedMaxOffset( $offset, (string) -$subjectLength, (string) $subjectLength );
		}

		$matches = [];
		if ( 0 === @preg_match( $this->regularExpression, $subject, $matches, $flags, $offset ) )
		{
			if ( true === $throwNoMatchException )
			{
				throw RegularExpressionNotMatchingException::with_nonMatchingRegularExpression( $this->regularExpression );
			}

			return null;
		}

		return $matches;
	}

	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function matchAll( string $subject, bool $throwNoMatchException = true, int $flags = RegularExpressionMatchAllFlag::None->value, int $offset = 0 ): ?array
	{
		$subjectLength = strlen( $subject );
		if ( $subjectLength < abs( $offset ) )
		{
			throw OffsetOutOfRangeException::with_outOfRangeOffsetExpectedMinOffsetAndExpectedMaxOffset( $offset, (string) -$subjectLength, (string) $subjectLength );
		}

		$matches = [];
		if ( 0 === @preg_match_all( $this->regularExpression, $subject, $matches, $flags, $offset ) )
		{
			if ( true === $throwNoMatchException )
			{
				throw RegularExpressionNotMatchingException::with_nonMatchingRegularExpression( $this->regularExpression );
			}

			return null;
		}

		return $matches;
	}

	/**
	 * {@inheritDoc}
	 */
	#[Override]
	public function replace( string $replacement, string $subject, bool $throwNoMatchException = true, int $limit = -1, ?int &$replacedCount = null ): string
	{
		if ( -1 > $limit )
		{
			throw InvalidLimitException::with_invalidLimit( $limit );
		}

		$pregReplaceResult = @preg_replace( $this->regularExpression, $replacement, $subject, $limit, $replacedCount );
		if ( 0 !== $limit && 0 === $replacedCount && true === $throwNoMatchException )
		{
			throw RegularExpressionNotMatchingException::with_nonMatchingRegularExpression( $this->regularExpression );
		}

		return $pregReplaceResult;
	}
}
