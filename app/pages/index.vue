<script setup lang="ts">
const config = useAppConfig();

useHead({
	title: config.meta.title,
	titleTemplate: null,
});

definePageMeta({
	layout: 'default',
});

const query = gql`
	query Entry ($slug: [String]!) {
		entry(slug: $slug) {
			id
			slug
		}
	}
`;

const variables = {
	slug: 'home',
};

const { data } = await useAsyncQuery(query, variables);

console.warn(data.value);
</script>

<template>
	<NuxtLayout>
		<h1>Nuxt</h1>
	</NuxtLayout>
</template>
