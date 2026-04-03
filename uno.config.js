import presetBasic from '@somehow-digital/unocss-preset';
import { defineConfig } from 'unocss';
import { PATHS } from './vite.config.js';

const RULES = {
	'bg-current': /^bg-current(?:\/(\d{1,3}))?$/,
};

const CONTENT = {
	include: [
		/\.(vue|php|html|twig|js|ts)(\?|$)/,
	],
};

export default defineConfig({
	presets: [
		presetBasic(),
	],
	rules: [
		[
			RULES['bg-current'],
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
			include: CONTENT.include,
		},
		filesystem: [
			PATHS.templates,
		],
	},
});
