import { defineConfig } from 'vite';

export default defineConfig({
	build: {
		manifest: true,
		outDir: 'web/assets/',
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
});
