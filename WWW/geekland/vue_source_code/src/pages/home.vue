<script setup lang="ts">
import { onMounted, reactive, ref } from "vue";
import * as api from "@/api";
import { func } from "vue-types";

import { super_store } from "@/store";

import { CommentOutlined, RetweetOutlined, LikeOutlined, ShareAltOutlined, SendOutlined } from '@ant-design/icons-vue';

const page_size = 5

const tempData = reactive({
  page_num: 1,
  loadMoreText: 'Load More',
  message_id_of_the_clicked_one: null as null | string,
})

const data = reactive({
  message_a: "",
  message_b: "",
  message_list: [] as any[],
  comment_a: "",
  comment_b: "",
  current_selected_comments: [] as any[]
});

const functions = reactive({
  refresh: async () => {
    data.message_list = await api.get_message_list(
      page_size,
      1
    )
  },
  create_message: async () => {
    await api.create_message(data.message_a, data.message_b)
    await functions.refresh();
  },
  get_more_messages: async () => {
    tempData.page_num += 1
    const more_messages = await api.get_message_list(
      page_size,
      tempData.page_num
    )
    data.message_list.push(...more_messages)
    if (more_messages.length > 0) {
      tempData.loadMoreText = "Load More"
    } else if (more_messages.length == 0) {
      tempData.loadMoreText = "No More Messages"
    }
  },
  on_message_click: async (message_id: any) => {
    tempData.message_id_of_the_clicked_one = message_id;
    let the_item = null
    for (const item of data.message_list) {
      // console.log(item?.id)
      if (item?.id == message_id) {
        the_item = item
      }
    }
    // console.log(the_item, data.message_list, message_id)
    data.current_selected_comments = []
    if (the_item && the_item?.comments) {
      for (const comment_id of JSON.parse(the_item?.comments)) {
        data.current_selected_comments.push(
          await api.get_message_by_id(comment_id)
        )
      }
    }
  },
  add_a_comment: async (message_id: string) => {
    await api.create_comment(data.comment_a, "", message_id)
    await functions.refresh();
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
          <a-button type="primary" ghost @click="functions.create_message">Share</a-button>
        </div>
      </div>

      <div class="
      the_container_of_message_list_view
      flex flex-col 
      justify-center items-center
      border
      my-4
      " v-if="data.message_list.length">
        <div class="
        each_row_of_message_list_view
        w-full
        " v-for="(item, index) in data.message_list">
          <div class="
          devide_line

          w-full
          h-[0.5px]
          bg-slate-300	
          " v-if="index != 0"></div>
          <div class="
        w-full
        min-h-[50px]
        flex flex-row
        justify-start
        items-start
        mt-[6px]
        mb-[6px]
                hover:bg-sky-100
        " @click="functions.on_message_click(item?.id)">
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
          "> {{ index }} </div>
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
                <div class="text-[15px] font-bold">{{ item?.username }}</div>
                <!-- <div class="text-[14px]">username</div> -->
                <div class="">·</div>
                <div class="">{{ super_store.time.convert_timestamp_to_string(item?.date) }}</div>
              </div>

              <div class="
            message_center_body
            flex flex-row
            items-end
            mt-[2px]
            ">
                <div>
                  {{ item.public_message }}
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

          <div v-if="
            tempData.message_id_of_the_clicked_one
            && tempData.message_id_of_the_clicked_one == item?.id
          " class="
          message_child_box
          ml-[10px]
          mt-[30px]
          mr-[10px]
          mb-[20px]
          ">
            <div class="
            the_reply_input_row

            flex flex-row
            ">
              <div class="
              flex flex-col
              justify-center
              items-center
              ">
                <div class="
            the_circle_head

            w-[50px] 
            h-[50px]
            bg-lime-300	
            rounded-full

            flex flex-row
            justify-center
            items-center
            ">A</div>
              </div>
              <a-textarea class="
            the_input_box

            mx-[20px]
            h-[40px]
              " v-model:value="data.comment_a" placeholder="Reply Message" auto-size />
              <div class="
            the_reply_button

            w-[80px]
            text-[24px]
            flex justify-center items-center
            ">
                <a-button type="primary" ghost shape="round" :size="24" @click="functions.add_a_comment(item?.id)">
                  <template #icon>
                    <DownloadOutlined />
                  </template>
                  Reply
                </a-button>
              </div>
            </div>
            <div class="
            the_comment_list
            w-full flex flex-col
            justify-center items-start
            ">
              <div v-for="comment_item in data.current_selected_comments" class="flex flex-row justify-start
              mt-[10px]
              ">
                <div class="mr-[10px]
                the_circle_head

                w-[50px] 
                h-[50px]
                bg-lime-300	
                rounded-full

                flex flex-col
                justify-center items-center
                ">
                  {{ 'B' }}
                </div>
                <div class="
            ml-[10px]
                ">
                  <div class="
            message_head_info_row
            flex flex-row [&>*]:mr-2
            items-end
            ">
                    <div class="text-[15px] font-medium">{{ item?.username }}</div>
                    <!-- <div class="text-[14px]">username</div> -->
                    <div class="">·</div>
                    <div class="">{{ super_store.time.convert_timestamp_to_string(item?.date) }}</div>
                  </div>

                  <div>
                    {{ comment_item?.public_message }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-row justify-center mb-4">
        <div @click="functions.get_more_messages">{{ tempData.loadMoreText }}</div>
      </div>

    </div>
  </div>
</template>

<style lang="scss" scoped>
.ant-input {
  width: 600px !important;
  height: 100px !important;
}

.message_child_box {
  .ant-input {
    height: 70px !important;
  }
}
</style>
