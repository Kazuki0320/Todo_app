<template>
  <v-app>
    <v-main>
      <div class="todo-add">
        <h1>Todoアプリ</h1>
        <v-row>
          <v-col
          cols="8">
            <v-text-field
              v-model="newTodoTheme"
              hide-details
              label="Todoの内容を記述してください。"
              @keydown.enter="addTodoEvent"
            ></v-text-field>
            <v-btn
            class="ma-5"
            type="submit"
            color="hsla(200, 80%, 50%, 1)"
            @click="addTodoEvent">
            追加
            </v-btn>
          </v-col>
        </v-row>
      </div>
      <v-container>
      <v-row>
        <v-col
        cols="12">
          <v-list>
            <v-list-item
            v-for="(todoValue, index) in todoValues" :key="index">
              <div class="d-flex pa-4">
                <v-checkbox-btn
                  v-model="todoValue.isChecked"
                  class="checkbox"
                ></v-checkbox-btn>
                <v-card
                  v-if="todoValue.isChecked"
                  color="grey"
                  :style="cardContent"
                  class="pa-2"
                  outlined
                  tile>
                  <v-list-item-title
                    :style="cardTextStyle"
                    hide-details>
                    {{ todoValue.name }}
                  </v-list-item-title>
                </v-card>
                <v-card
                  v-else
                  :style="cardContent"
                  class="pa-2"
                  outlined
                  tile>
                  <v-list-item-title
                    :style="cardTextStyle"
                    hide-details>
                    {{ todoValue.name }}
                  </v-list-item-title>
                </v-card>
              </div>
            </v-list-item>
          </v-list>
        </v-col>
      </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const newTodoTheme = ref("");
const todoValues = computed(() => store.getters.todoList);
let todoValueList = ref("");

const addTodoEvent = () => {
  if (newTodoTheme.value) {
    todoValueList = {
      name: newTodoTheme.value,
      isChecked: false
    }
    store.dispatch('updateTodo', [...store.getters.todoList, todoValueList]);
    newTodoTheme.value = "";
  } else {
    alert("値を入力してください");
  }
}

// style オプション内でCSSを定義
const cardTextStyle = `
.card-text {
    font-size: 20%; /* カードの高さに対して相対的なフォントサイズを設定 */
  }`

const cardContent =`
.card-content {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}`;
</script>
