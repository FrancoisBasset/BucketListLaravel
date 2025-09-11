<template>
	<q-layout view="hHh LpR fFf">
		<q-header class="bg-teal-5">
			<q-toolbar>
				<q-toolbar-title>
					<q-btn to="/" flat class="bg-teal-9 rounded q-ma-xs">
						<q-icon name="mdi-bucket" size="40px" color="yellow" class="q-mr-sm" />
						<span class="text-h5 text-weight-bold">BucketList</span>
					</q-btn>
				</q-toolbar-title>

				<q-btn-group>
					<q-btn to="/connexion">Connexion</q-btn>
					<q-btn to="/inscription">Inscription</q-btn>
				</q-btn-group>
			</q-toolbar>
		</q-header>

		<q-page-container>
			<router-view />
		</q-page-container>
	</q-layout>
</template>
<script setup lang="ts"></script>
