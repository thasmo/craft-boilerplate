export default {
	entry: ['app/**/*.{ts,vue}'],
	ignoreDependencies: ['@iconify-json/ri', 'vue', 'vue-router', '@graphql-codegen/introspection'],
	ignoreBinaries: ['dotenvx'],
	ignore: ['app/.types/**/*.*'],
};
