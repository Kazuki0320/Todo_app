<template>
  <v-app>
    <v-main>
      <div class="todo-add">
        <h1>Todoアプリ</h1>
              <v-text-field
                v-model="todoData"
                :disabled="includeFiles"
                hide-details
                label="Todoの内容を記述してください。"
              ></v-text-field>
            <v-btn 
            class="ma-5"
            type="submit"
            color="hsla(200, 80%, 50%, 1)"
            @click="addTodoEvent">
            追加
            </v-btn>
          <input >
      </div>
      <v-card>
        <v-card-text>
          <div class="d-flex pa-4">
            <!-- 
              後程使用
              <v-checkbox-btn
              v-model="includeFiles"
              class="checkbox"
            ></v-checkbox-btn> -->
            <!-- <v-text-field
              :disabled="includeFiles"
              hide-details
              label="Todoの内容を記述してください。"
            ></v-text-field> -->
          </div>
        </v-card-text>
      </v-card>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const includeFiles = ref(false);
const todoData = ref('');

const addTodoEvent = () => {
  if (todoData.value) {
    store.dispatch('updateTodo', todoData.value);
    todoData.value = '';
  } else {
    alert("値を入力してください");
  }
}

</script>
