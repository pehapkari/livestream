<template>
  <div>
    <div class="has-text-centered">
      <button class="button is-primary is-medium button-add-post" @click="onClickAddPost">Add post</button>
    </div>
    <data-table></data-table>
    <modal ref="postModal"></modal>
  </div>
</template>

<script>
import {HTTP} from '@/api'
import DataTable from './DataTable'
import Modal from './Modal'

export default {
  components: {
    DataTable,
    Modal
  },

  created() {
    HTTP.get('/posts').then((response) => {
      EventBus.$emit('fecthedPosts', response.data)
    })
  },

  methods: {
    onClickAddPost() {
      EventBus.$emit('modalShow')
    }
  }
}
</script>


<style scoped>
.button-add-post {
  margin-bottom: 3rem;
}
</style>
