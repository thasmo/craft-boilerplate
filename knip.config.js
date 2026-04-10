export default {
	entry: ['assets/sites/*/main.ts', 'vite.config.js'],
	ignore: ['plugins/**'],
	ignoreDependencies: ['@voidzero-dev/vite-plus-core', 'lint-staged'],
	typescript: {
		config: ['tsconfig.json'],
	},
};
