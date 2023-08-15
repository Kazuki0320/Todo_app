<template>
  <h1>ログイン</h1>
  <p><v-btn @click="signInWithGoogle">Googleでサインインする</v-btn></p>
</template>

<script setup>
import { getAuth, GoogleAuthProvider, signInWithPopup } from "firebase/auth";
import { useRouter } from 'vue-router'
const router = useRouter()

function signInWithGoogle() {
  const provider = new GoogleAuthProvider();
  signInWithPopup(getAuth(), provider)
    .then((result) => {
      console.log(result);
      router.push("/");
    })
    .catch((error) => {
      console.log(error.message);
    });
}
</script>