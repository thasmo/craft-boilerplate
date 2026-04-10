export default {
	entry: ['assets/sites/*/main.ts', 'vite.config.js'],
	ignore: ['plugins/**'],
	ignoreDependencies: ['@voidzero-dev/vite-plus-core'],
	typescript: {
		config: ['tsconfig.json'],
	},
};
