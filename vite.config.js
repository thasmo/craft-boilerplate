import vue from '@vitejs/plugin-vue';
import unocss from 'unocss/vite';
import { defineConfig } from 'vite';
import restart from 'vite-plugin-restart';
import tools from 'vite-plugin-vue-devtools';

export const PATHS = {
	templates: 'templates/**/*.twig',
};

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
			rollupOptions: {
				input: {
					single: 'assets/sites/single/main.ts',
					multi: 'assets/sites/multi/main.ts',
				},
			},
		},
		server: {
			host: '0.0.0.0',
			port: 5173,
			strictPort: true,
			cors: {
				origin: /https?:\/\/(.+)?(\.ddev\.site)(?::\d+)?$/,
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
