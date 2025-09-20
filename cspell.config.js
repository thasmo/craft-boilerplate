export default {
	dictionaries: ['project'],
	dictionaryDefinitions: [
		{
			addWords: true,
			name: 'project',
			path: './dictionary.txt',
		},
	],
	ignorePaths: [
		'.nuxt',
		'.output',
		'.upsun',
		'vendor',
		'storage',
		'composer.json',
		'web/cpresources',
		'config/license.key',
		'config/**/',
		'.env.example',
	],
	import: ['@somehow-digital/cspell-dictionary'],
	language: 'en',
	version: '0.2',
};
