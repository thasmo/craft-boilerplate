import { defineConfig } from 'unocss'
import presetBasic from '@somehow-digital/unocss-preset';

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
