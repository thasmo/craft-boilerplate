<?php

namespace modules\site;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
	private const string EXPAND_PATTERN = '/([^\s(]+)([:|-])\(([^()]+)\)/';

	public function getFilters(): array
	{
		return [
			new TwigFilter('expand', $this->expand(...)),
		];
	}

	public function getFunctions(): array
	{
		return [
			new TwigFunction('expand', $this->expand(...)),
		];
	}

	public function expand(string $classes): string
	{
		if (!str_contains($classes, '(')) {
			return $classes;
		}

		do {
			$classes = preg_replace_callback(
				self::EXPAND_PATTERN,
				static function (array $matches): string {
					$prefix = $matches[1];
					$separator = $matches[2];
					$parts = preg_split('/\s+/', trim($matches[3]), -1, PREG_SPLIT_NO_EMPTY);

					return implode(' ', array_map(
						static fn(string $part): string => $prefix . $separator . $part,
						$parts
					));
				},
				$classes,
				-1,
				$count
			);
		} while ($count > 0);

		return $classes;
	}
}
