<template>
	<Card :title="title">
		<q-input v-model="username" label="Nom d'utilisateur" filled color="teal" />

		<q-input type="password" v-model="password"  label="Mot de passe" filled color="teal" />

		<div class="text-center">
			<q-btn :label="title" color="teal" type="submit" />
		</div>
	</Card>
</template>

<script setup>
import Card from './lib/Card.vue';
import {computed, ref} from "vue";

const props = defineProps(['mode']);

const title = computed(() => props.mode === 'login' ? 'Connexion' : 'Inscription');

const username = ref('');
const password = ref('');

function getJSONBody() {
	return JSON.stringify({
		username: username.value,
		password: password.value
	});
}

function register() {
	fetch('http://127.0.0.1/api/register', {
		method: 'POST',
		headers: {
			'Accept': 'application/json'
		},
		body: getJSONBody()
	})
}

function login() {
	fetch('http://127.0.0.1/api/login', {
		method: 'POST',
		headers: {
			'Accept': 'application/json'
		},
		body: getJSONBody()
	})
}
</script>