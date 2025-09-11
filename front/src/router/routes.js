import MainLayout from '../layouts/MainLayout.vue';

const routes = [
	{
		path: '/',
		component: MainLayout,
		children: [{ path: '', component: () => import('pages/IndexPage.vue') }]
	},
	{
		path: '/connexion',
		component: MainLayout,
		children: [{ path: '', component: () => import('pages/LoginPage.vue') }]
	},
	{
		path: '/inscription',
		component: MainLayout,
		children: [{ path: '', component: () => import('pages/RegisterPage.vue') }]
	}
];

export default routes;
