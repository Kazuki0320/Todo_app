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
              @keydown.enter="handleAddTodo"
            ></v-text-field>
            <v-btn
            class="ma-5"
            type="submit"
            color="hsla(200, 80%, 50%, 1)"
            @click="handleAddTodo">
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
                  class="pa-2 ma-2"
                  outlined
                  tile>
                  <v-list-item-title
                    :style="cardTextStyle"
                    hide-details>
                    {{ todoValue.name }}
                  </v-list-item-title>
                </v-card>
                <v-btn
                  class="ma-2"
                  color="blue"
                  height="40"
                  type="submit"
                  @click="handleOpenModal(index)">
                  編集
                  <v-dialog
                    v-model="showDialog[index]"
                    persistent
                    width="1024">
                    <v-card>
                      <v-card-title>
                        <span class="text-h5">todo編集</span>
                      </v-card-title>
                      <v-card-text>
                        <v-container>
                          <v-text-field v-model="todoValue.name"
                          ></v-text-field>
                        </v-container>
                      </v-card-text>
                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                          color="blue-darken-1"
                          variant="text"
                          @click="handleCloseModal(index)">
                          キャンセル
                        </v-btn>
                        <v-btn
                          color="blue-darken-1"
                          variant="text"
                          @click="handleUpdateTodo(index)">
                          更新
                        </v-btn>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>
                </v-btn>
                <v-btn
                  class="ma-2"
                  color="red"
                  height="40"
                  type="submit"
                  @click="handleDeleteTodo(index)">
                  削除
                </v-btn>
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
const showDialog = ref({});

const handleAddTodo = () => {
  if (!newTodoTheme.value) return;

  const newTodo = {
    name: newTodoTheme.value,
    isChecked: false
  };
  store.dispatch('updateTodoList', [...todoValues.value, newTodo]);
  newTodoTheme.value = "";
}

const handleUpdateTodo = (index) => {
  store.dispatch('updateTodoList', todoValues.value);
  showDialog.value[index] = false;
}

const handleDeleteTodo = (index) => {
  confirm("本当に削除していいですか？");
  if(!confirm) return;
  
  const updatedTodoList = [...todoValues.value];
  updatedTodoList.splice(index, 1);
  store.dispatch('updateTodoList', updatedTodoList);
}

const handleOpenModal = (index) => {
  showDialog.value[index] = true;
}

const handleCloseModal = (index) => {
  showDialog.value[index] = false;
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