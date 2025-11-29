import presetBasic from '@somehow-digital/unocss-preset';
import { defineConfig } from 'unocss';
import { PATHS } from './vite.config.js';

export default defineConfig({
	presets: [
		presetBasic(),
	],
	content: {
		pipeline: {
			include: [
				/\.(vue|svelte|[jt]sx|php|html|twig)($|\?)/,
			],
		},
		filesystem: [
			PATHS.templates,
		],
	},
});
