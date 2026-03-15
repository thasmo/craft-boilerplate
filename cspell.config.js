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
		'.ddev/',
		'.upsun/',
		'vendor/',
		'storage/',
		'plugins/',
		'web/assets/',
		'web/cpresources/',
		'config/htmlpurifier/',
		'composer.json',
		'config/license.*',
	],
	import: ['@somehow-digital/cspell-dictionary'],
	language: 'en',
	version: '0.2',
};
