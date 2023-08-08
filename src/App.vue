<template>
  <v-app>
    <v-main>
      <TodoInput/>
    </v-main>
  </v-app>
</template>

<script>
import TodoInput from './components/TodoInput.vue'

export default {
  name: 'App',

  components: {
    TodoInput,
  },

  data: () => ({
    //
  }),
}
</script>
