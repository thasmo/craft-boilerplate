import vue from '@vitejs/plugin-vue';
import path from 'node:path';
import { globSync } from 'tinyglobby';
import unocss from 'unocss/vite';
import restart from 'vite-plugin-restart';
import tools from 'vite-plugin-vue-devtools';
import { defineConfig } from 'vite-plus';

export const PATHS = {
	templates: 'templates/**/*.twig',
};

const origin = /https?:\/\/(.+)?(\.ddev\.site)(?::\d+)?$/;

export default defineConfig(({ command }) => {
	return {
		build: {
			target: 'esnext',
			manifest: true,
			outDir: 'web/assets/',
			sourcemap: command === 'serve',
			modulePreload: {
				polyfill: false,
			},
			rolldownOptions: {
				input: Object.fromEntries(
					globSync('assets/sites/*/main.ts').map(file => [
						path.basename(path.dirname(file)),
						path.resolve(file),
					]),
				),
			},
		},
		server: {
			host: '0.0.0.0',
			port: 5173,
			strictPort: true,
			cors: {
				origin,
			},
			allowedHosts: [
				'viteplus',
				'.ddev.site',
			],
		},
		plugins: [
			unocss(),
			vue(),
			tools(),
			restart({
				delay: 0,
				reload: [
					PATHS.templates,
				],
			}),
		],
		resolve: {
			alias: {
				vue: 'vue/dist/vue.esm-bundler.js',
			},
		},
	};
});
