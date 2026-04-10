import presetBasic from '@somehow-digital/unocss-preset';
import { createLocalFontProcessor } from '@unocss/preset-web-fonts/local';
import { defineConfig, presetWebFonts } from 'unocss';
import { PATHS } from './vite.config.js';

const RULES = {
	'bg-current': /^bg-current(?:\/(\d{1,3}))?$/,
};

const CONTENT = {
	include: [
		/\.(vue|php|html|twig|js|ts|css)(\?|$)/,
	],
};

export default defineConfig({
	presets: [
		presetBasic(),
		presetWebFonts({
			fonts: {
				display: 'Sentient',
				base: 'Sora',
			},
			provider: 'fontshare',
			processors: createLocalFontProcessor({
				cacheDir: 'node_modules/.cache/unocss/fonts/',
				fontAssetsDir: 'web/assets/fonts/',
				fontServeBaseUrl: '/assets/fonts',
			}),
		}),
	],
	theme: {
		fonts: {
			display: 'Sentient',
			base: 'Sora',
		},
	},
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
