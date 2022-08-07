<template>
  <div id="app">
    <router-view />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount, onMounted, reactive } from "vue";

import { useI18n } from "vue-i18n";
import { useRouter, useRoute } from "vue-router";

const route = useRoute();
const router = useRouter();
// const { locale, t } = useI18n();

onMounted(() => {});
</script>

<style></style>
