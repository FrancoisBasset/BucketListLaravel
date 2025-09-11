<template>
	<q-page class="row justify-center items-center q-pa-md bg-grey-2">
		<q-card class="q-pa-lg shadow-2 rounded-borders" style="width: 400px; max-width: 90vw">
			<q-card-section>
				<div class="text-h5 text-center text-weight-bold">{{ title }}</div>
			</q-card-section>

			<q-card-section class="q-gutter-md">
				<slot></slot>
			</q-card-section>
		</q-card>
	</q-page>
</template>

<script setup>
defineProps(['title']);
</script>
