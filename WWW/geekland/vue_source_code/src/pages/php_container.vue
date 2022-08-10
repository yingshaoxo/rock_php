<script setup lang="ts">
import { onMounted, reactive } from "vue";
import * as api from "@/api";
import config from '@/config'


const data = reactive({
});

const functions = reactive({
  refresh: async () => {
  }
})

onMounted(async () => {
  console.log(config.HOST)
});
</script>

<template>
  <iframe class="w-screen h-screen" :src="
    config.HOST + '/vue'
  " title="W3Schools Free Online Web Tutorials"></iframe>
</template>

<style>
</style>
