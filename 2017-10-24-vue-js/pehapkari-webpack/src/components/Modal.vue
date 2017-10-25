<template>
  <div :class="['modal', { 'is-active': isActive }]">
    <div class="modal-background"></div>
    <div class="modal-content">
      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" placeholder="Text input" v-model="post.title">
        </div>
      </div>
      <div class="field">
        <label class="label">Body</label>
        <div class="control">
          <textarea class="textarea" placeholder="Textarea" v-model="post.body"></textarea>
        </div>
      </div>
      <div class="control">
        <button class="button is-link" @click="onClickSave">Save</button>
      </div>
    </div>
    <button class="modal-close is-large" aria-label="close" @click="close"></button>
  </div>
</template>

<script>
import {HTTP} from '@/api'

export default {
  data: () => ({
    post: {
      title: '',
      body: '',
    },
    isActive: false
  }),

  created() {
    EventBus.$on('modalShow', this.open)
  },

  methods: {
    open(post) {
      this.isActive = true
      this.post = Object.assign({}, post)
    },

    close() {
      this.isActive = false
      this.post = {
        title: '',
        body: ''
      }
    },

    onClickSave() {
      const {id, ...post} = this.post
      if (id) {
        HTTP.put(`/posts/${id}`, post).then((response) => {
          EventBus.$emit('postUpdated', this.post)
          this.close()
          alert('Updated')
        })
      } else {
        HTTP.post(`/posts`, post).then((response) => {
          EventBus.$emit('postCreated', response.data)
          this.close()
          alert('Created')
        })
      }
    }
  }
}
</script>

<style>
.modal-content {
  padding: 3rem;
  background-color: white;
}
</style>
