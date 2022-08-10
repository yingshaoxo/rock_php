<script setup lang="ts">
import { onMounted, reactive } from "vue";
import * as api from "@/api";
import { func } from "vue-types";

const data = reactive({
  task_list: null as any[] | null,
});

const functions = reactive({
  refresh: async () => {
    data.task_list = await api.get_task_list();
  }
})

onMounted(async () => {
  await functions.refresh()
});
</script>

<template>
  <div class="w-100 h-screen flex flex-col justify-start items-center">
    <div class="flex flex-col justify-center 
    mt-10
    text-2xl
    ">Admin Page</div>
    <p v-if="data.task_list?.length == 0" class="
    mt-8
    text-rose-500	
    text-center">No Task Yet</p>
    <div class="list-group flex flex-col justify-center items-center mt-8">
      <div class="h-100 w-3/4 flex flex-col justify-center" aria-current="true" v-for="item in data.task_list">
        <div class="
        w-100 h-100 
        flex flex-row justify-start items-center
        border-2	
        px-2 py-2
        ">
          <div class="bg-gray-10 pr-8">
            {{ item }}
          </div>
          <div class="w-[400px] flex flex-row justify-between items-center">
            <a-button type="primary" class="w-20 h-8 bg-blue-500" @click="async () => {
              await api.confirm_task(item?.id)
              await functions.refresh();
            }">
              Confirm
            </a-button>
            <a-button type="primary" danger class="w-20 h-8" @click="async () => {
              await api.refuse_task(item?.id)
              await functions.refresh();
            }">
              Refuse
            </a-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
</style>
