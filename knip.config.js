export default {
	entry: ['assets/sites/*/main.ts'],
	ignore: ['plugins/**'],
	ignoreDependencies: ['@voidzero-dev/vite-plus-core'],
	typescript: {
		config: ['tsconfig.json'],
	},
};
