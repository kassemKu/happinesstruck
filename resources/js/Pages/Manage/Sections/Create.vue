<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.sections.index')"
        :parent-name="$t('sections')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('section') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__sections-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('section') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('section') })
            "
            @formSubmitted="createSection"
          >
            <TextField
              v-model="form.ar_name"
              name="ar_name"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :server-error="$page.props.errors.ar_name"
            />
            <HTextarea
              v-model="form.ar_description"
              optional
              name="ar_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :server-error="$page.props.errors.ar_description"
            />
            <TextField
              v-model="form.en_name"
              name="en_name"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :server-error="$page.props.errors.en_name"
            />
            <HTextarea
              v-model="form.en_description"
              optional
              name="en_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :server-error="$page.props.errors.en_description"
            />
            <div class="mb-8">
              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <input
                    v-model="form.published"
                    type="checkbox"
                    class="checkbox"
                    :checked="form.published"
                  />
                  <span class="label-text text-sm font-semibold capitalize"
                    >publish</span
                  >
                </label>
              </div>
              <p
                v-if="form.errors.published"
                class="text-xs text-red-500 font-bold"
              >
                {{ form.errors.published }}
              </p>
            </div>
            <div class="mb-6">
              <div class="mb-2 flex space-x-2 items-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >product image/s</span
                >
              </div>
              <div class="w-full flex flex-col mb-4">
                <div class="w-full">
                  <FileUpload @input="uploadSectionMedia" />
                </div>
                <div
                  v-show="media.length > 0"
                  class="
                    w-full
                    flex flex-col
                    space-y-4
                    transition
                    ht-base-transition
                  "
                >
                  <div
                    v-for="(img, index) in media"
                    :key="index"
                    class="relative flex space-x-2 items-center"
                  >
                    <img
                      :src="img.url"
                      alt="happiness truck"
                      class="
                        rounded-2xl
                        h-16
                        w-16
                        object-cover
                        transition
                        ht-base-transition
                      "
                    />
                    <div class="w-full flex flex-col">
                      <button
                        type="button"
                        class="
                          self-end
                          btn btn-ghost btn-circle btn-xs
                          text-gray-400
                          hover:text-error hover:bg-error hover:bg-opacity-20
                        "
                        @click="removeImg(index, img)"
                      >
                        <VueFeather type="x" class="h-4 w-4" stroke-width="4" />
                      </button>
                      <div class="flex flex-col">
                        <div
                          class="
                            flex
                            space-x-4
                            text-xs
                            font-semibold
                            text-gray-400
                            uppercase
                            mb-2
                            font-sans
                          "
                        >
                          <span>{{ img.originName }}</span>
                          <span class="text-base-300">{{ img.size }}</span>
                        </div>
                      </div>
                      <progress
                        class="progress upload-progress"
                        value="100"
                        max="100"
                      ></progress>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Media uploader -->
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import { reactive } from 'vue'
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import axios from 'axios'
import { useStore } from 'vuex'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
import FileUpload from '@/Shared/UI/FileUpload'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  // CheckBox,
}

export default {
  name: 'ManageSectionCreate',
  components,

  setup() {
    const form = useForm({
      ar_name: null,
      ar_description: null,
      en_name: null,
      en_description: null,
      published: true,
      mediaIds: [],
    })
    const page = usePage()
    const store = useStore()
    let media = reactive([])

    const uploadSectionMedia = (files) => {
      Array.from(files).forEach((file) => {
        let reader = new FileReader()

        reader.readAsDataURL(file)

        reader.onload = (e) => {
          let tool = {
            url: e.target.result,
            id: undefined,
            originName: file.name,
            size: (file.size / 1048576).toFixed(2) + ' MB',
          }

          let formData = new FormData()

          formData.append('file', file)
          formData.append('directory_name', 'sections')

          axios
            .post(route('manage.media.store'), formData)
            .then((res) => {
              tool.id = res.data.id
            })
            .then(() => {
              store.commit('openNotification', {
                title: 'upload file',
                content: `tool image uploaded successfully`,
              })
            })

          media.push(tool)
        }
      })
    }

    const removeImg = (index, img) => {
      media.splice(index, 1)

      if (img.id) {
        axios
          .delete(route('manage.media.destroy', img.id))
          .catch((error) => {
            console.log(error)
            media.splice(index, 0, img)
          })
          .then(() => {
            store.commit('openNotification', {
              title: 'delete file',
              content: `tool image deleted successfully`,
            })
          })
      }
    }

    const createSection = () => {
      form.mediaIds = media.map((img) => img.id)
      form.post(route('manage.sections.store'), {
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onError: (errors) => {
          store.commit('openNotification', {
            title: 'something went wrong',
            type: 'error',
            content: errors,
          })
        },
        onSuccess: () => {
          if (
            page.props.value.errors &&
            Object.keys(page.props.value.errors).length === 0
          ) {
            form.reset()
            media = []
            form.mediaIds = []
            store.commit('openNotification', {
              title: 'create tool',
              type: 'success',
              content: 'tool created successfully',
            })
          }
        },
      })
    }

    return { form, media, uploadSectionMedia, removeImg, createSection }
  },

  remember: 'form',
}
</script>
