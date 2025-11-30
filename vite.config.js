import vue from '@vitejs/plugin-vue';
import process from 'node:process';
import unocss from 'unocss/vite';
import { defineConfig, loadEnv } from 'vite';
import restart from 'vite-plugin-restart';
import tools from 'vite-plugin-vue-devtools';

export const PATHS = {
	templates: 'templates/**/*.twig',
};

export default defineConfig(({ command, mode }) => {
	const environment = loadEnv(mode, process.cwd(), '');

	return {
		build: {
			target: 'esnext',
			manifest: true,
			outDir: 'web/assets/',
			sourcemap: command === 'serve',
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
			origin: `${environment.DEFAULT_SITE_URL}:3000`,
			cors: {
				origin: /https?:\/\/(.+)?(\.ddev\.site)(?::\d+)?$/,
			},
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
