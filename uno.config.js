import presetBasic from '@somehow-digital/unocss-preset';
import { defineConfig } from 'unocss';
import { PATHS } from './vite.config.js';

export default defineConfig({
	presets: [
		presetBasic(),
	],
	rules: [
		[
			/^bg-current(?:\/(\d{1,3}))?$/,
			([, opacity]) => {
				const percent = opacity ? Math.min(Math.max(Number(opacity), 0), 100) : 100;

				return {
					'background-color': `color-mix(in srgb, currentColor ${percent}%, transparent)`,
				};
			},
		],
	],
	content: {
		pipeline: {
			include: [
				/\.(vue|php|html|twig)($|\?)/,
			],
		},
		filesystem: [
			PATHS.templates,
		],
	},
});
