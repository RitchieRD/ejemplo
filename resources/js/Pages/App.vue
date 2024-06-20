<template>
	<div>
		<h1>Welcome to Inertia.js with Vue 2 and Laravel 10</h1>
		<button type="button" class="btn btn-primary">Primary</button>
		<button type="button" class="btn btn-secondary">Secondary</button>
		<button type="button" class="btn btn-success">Success</button>
		<button type="button" class="btn btn-danger">Danger</button>
		<button type="button" class="btn btn-warning">Warning</button>
		<button type="button" class="btn btn-info">Info</button>
		<button type="button" class="btn btn-light">Light</button>
		<button type="button" class="btn btn-dark">Dark</button>

		<button type="button" class="btn btn-link">Link</button>
	</div>
</template>

<script>
export default {
	name: "App",
	props: { numero: Number },
};
</script>