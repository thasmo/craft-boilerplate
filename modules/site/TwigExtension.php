<?php

namespace modules\site;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
	public function getFilters(): array
	{
		return [
			new TwigFilter('expand', [$this, 'expand']),
		];
	}

	public function getFunctions(): array
	{
		return [
			new TwigFunction('expand', [$this, 'expand']),
		];
	}

	public function expand(string $classes): string
	{
		// Recursively expand nested groups from innermost to outermost
		// Pattern matches: prefix followed by : or - and then (content without nested parens)
		// The [^()]+ ensures we only match innermost groups first
		$pattern = '/([^\s(]+)([:|-])\(([^()]+)\)/';

		do {
			$classes = preg_replace_callback($pattern, function ($matches) {
				$prefix = $matches[1];
				$separator = $matches[2];
				$content = trim($matches[3]);

				$parts = array_filter(preg_split('/\s+/', $content));

				return implode(' ', array_map(
					fn($part) => $prefix . $separator . $part,
					$parts
				));
			}, $classes, -1, $count);
		} while ($count > 0);

		return $classes;
	}
}
