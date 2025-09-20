import process from 'node:process';
import { defineNuxtConfig } from 'nuxt/config';

export default defineNuxtConfig({
	compatibilityDate: '2025-09-01',
	devtools: {
		enabled: true,
	},
	modules: ['@unocss/nuxt', '@nuxt/eslint', '@nuxtjs/apollo'],
	eslint: {
		config: {
			standalone: false,
			autoInit: false,
		},
	},
	apollo: {
		clients: {
			default: {
				httpEndpoint: process.env.APP_GRAPHQL_ENDPOINT,
			},
		},
	},
});
