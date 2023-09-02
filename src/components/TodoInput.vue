<template>
  <v-app>
    <v-card>
      <v-card-text>
        <div class="d-flex pa-4">
          <v-checkbox-btn
            v-model="includeFiles"
            class="checkbox"
          ></v-checkbox-btn>
          <v-text-field
            v-model="massage"
            :disabled="includeFiles"
            hide-details
            label="Todoの内容を記述してください。"
          ></v-text-field>
        </div>
      </v-card-text>
    </v-card>
  </v-app>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const newTodoTheme = ref("");
const todoValues = computed(() => store.getters.todoList);

const addTodoEvent = () => {
  if (newTodoTheme.value) {
    const newTodo = {
      name: newTodoTheme.value,
      isChecked: false
    };
    store.dispatch('updateTodo', [...store.getters.todoList, newTodo]);
    newTodoTheme.value = "";
  }
});
</script>
