import type { CodegenConfig } from '@graphql-codegen/cli';
import process from 'node:process';

const config: CodegenConfig = {
	overwrite: true,
	schema: process.env.APP_GRAPHQL_ENDPOINT,
	documents: 'app/**/*.vue',
	generates: {
		'app/.types/': {
			preset: 'client',
		},
	},
};

export default config;
