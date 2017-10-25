<template>
  <table class="table is-striped">
    <thead>
      <th>Title</th>
      <th>Body</th>
      <th class="header-posts">Action</th>
    </thead>
    <tbody>
      <tr v-for="post in posts">
        <td>{{ post.title }}</td>
        <td>{{ post.body }}</td>
        <td>
          <button class="button is-link" @click="showDetails(post)">Show details</button>
          <button class="button is-danger" @click="deletePost(post)">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import {HTTP} from '@/api'

export default {
  data: () =>({
    posts: []
  }),

  created() {
    EventBus.$on('fecthedPosts', this.loadPosts)
    EventBus.$on('postUpdated', this.updatePost)
    EventBus.$on('postCreated', this.createPost)
  },

  beforeDestroy() {
    EventBus.$off('fecthedPosts', this.loadPosts)
    EventBus.$off('postUpdated', this.updatePost)
    EventBus.$off('postCreated', this.createPost)
  },

  methods: {
    loadPosts(posts) {
      this.posts = posts
    },

    updatePost(updatedPost) {
      const oldPost = this.posts.filter((post) => post.id === updatedPost.id)[0]
      this.posts.splice(this.posts.indexOf(oldPost), 1, updatedPost)
    },

    createPost(createdPost) {
      this.posts.push(createdPost)
    },

    showDetails(post) {
      EventBus.$emit('modalShow', post)
    },

    deletePost(post) {
      HTTP.delete(`/posts/${post.id}`).then((response) => {
        alert('Deleted')
        this.posts.splice(this.posts.indexOf(post), 1)
      })
    }
  }
}
</script>

<style>
.header-posts {
  width: 15rem;
}
</style>
