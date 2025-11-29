import { defineConfig } from 'vite';
import unocss from 'unocss/vite';
import restart from 'vite-plugin-restart';

export const PATHS = {
	templates: 'templates/**/*.twig',
}

export default defineConfig({
	build: {
		target: 'esnext',
		manifest: true,
		outDir: 'web/assets/',
		modulePreload: {
			polyfill: false,
		},
		rollupOptions: {
			input: {
				app: 'assets/main.ts',
			},
		},
	},
	server: {
		host: '0.0.0.0',
		port: 3000,
		strictPort: true,
		origin: `${process.env.DEFAULT_SITE_URL}:3000`,
		cors: {
			origin: /https?:\/\/(.+)?(\.ddev\.site)(?::\d+)?$/,
		},
	},
	plugins: [
		unocss(),
		restart({
			delay: 0,
			reload: [
				PATHS.templates,
			],
		}),
	],
});
