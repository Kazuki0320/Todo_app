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
  import { ref } from 'vue'

  const includeFiles = ref(false)

</script>
