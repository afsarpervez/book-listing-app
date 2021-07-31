<template>
	<div>
		<p>{{body}}</p>
		<div class="row">
		<div class="col-md-4"><p style="color: gray">Total books: {{booksCount}}</p></div>
		<div class="col-md-4"></div>
		<div class="col-md-4"><p style="color: gray"><i>created by {{user.name}}</i> {{postDate}}</p></div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['category'],

	data () {
		return {
			body: this.category.body,
			booksCount: this.category.books_count,
			postDate: this.category.created_date,
			user: this.category.user
		}
	}
}
</script>