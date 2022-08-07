<script setup lang="ts">
import { onMounted, reactive } from "vue";
import * as api from "@/api";

const data = reactive({
  task_list: null,
});

onMounted(async () => {
  data.task_list = await api.get_task_list();
});
</script>

<template>
  <div class="w-screen h-screen flex flex-col justify-center content-center text-center">
    <div>GeekLand</div>
    <!-- <div class="mt-10">{{ data.task_list }}</div> -->
  </div>
</template>

<style>
</style>
