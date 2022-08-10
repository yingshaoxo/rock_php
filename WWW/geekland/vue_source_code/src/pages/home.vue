<script setup lang="ts">
import { onMounted, reactive } from "vue";
import * as api from "@/api";
import { func } from "vue-types";

import { CommentOutlined, RetweetOutlined, LikeOutlined, ShareAltOutlined } from '@ant-design/icons-vue';

const data = reactive({
  message_a: "",
  message_b: "",
});

const functions = reactive({
  refresh: async () => {
  }
})

onMounted(async () => {
  await functions.refresh()
});
</script>

<template>
  <div class="w-100 h-screen flex flex-col justify-start items-center">
    <div class="w-[600px]">
      <div class="mt-10 flex flex-col">
        <a-textarea v-model:value="data.message_a" placeholder="Public Message" auto-size />
        <a-textarea v-model:value="data.message_b" placeholder="Private Message" auto-size />
        <div class="w-100 flex flex-row justify-end mt-2">
          <a-button type="primary" ghost>Share</a-button>
        </div>
      </div>

      <div class="
      the_container_of_message_list_view
      flex flex-col 
      justify-center items-center
      border
      my-4
      py-[10px]
      ">
        <div v-for="n in 10" class="
        each_row_of_message_list_view
        w-full
        min-h-[50px]
        flex flex-row
        justify-start
        items-start
        bg-sky-50	
        mb-[10px]
        last:mb-[0px]
        ">
          <div class="
          the_head_circle

          w-[50px] 
          h-[50px]
          bg-lime-300	
          rounded-full

          flex-none
          flex flex-row
          justify-center
          items-center

          m-[10px]
          "> {{ n }} </div>
          <div class="
          message_box
          w-auto
          h-full
          grow
          p-[10px]
          ">
            <div class="
            message_head_info_row
            flex flex-row [&>*]:mr-2
            items-end
            ">
              <div class="text-[15px] font-bold">nickname</div>
              <!-- <div class="text-[14px]">username</div> -->
              <div class="">·</div>
              <div class="">12:30</div>
            </div>

            <div class="
            message_center_body
            flex flex-row
            items-end
            mt-[2px]
            ">
              <div>
                Hello World.
              </div>
            </div>

            <div class="
            reaction_row
            flex
            flex-row
            mt-[10px]
            [&>*]:mr-[30px]
            ">
              <div class="comment_icon">
                <CommentOutlined />
              </div>
              <div class="farward_icon">
                <RetweetOutlined />
              </div>
              <div class="love_icon">
                <LikeOutlined />
              </div>
              <div class="share_icon">
                <ShareAltOutlined />
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<style lang="scss" scoped>
.ant-input {
  width: 600px !important;
  height: 100px !important;
}
</style>
