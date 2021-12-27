<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.tools.index')"
        :parent-name="$t('package_tools')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('tool') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__tools-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('tool') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('tool') })
            "
            max-width="5xl"
            @formSubmitted="createTool"
          >
            <div class="grid grid-cols-2 gap-x-10 tools-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('tool'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('tool'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_name"
              />
              <!-- arabic name -->
              <TextField
                v-model="form.en_name"
                name="en_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('tool'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('tool'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_name"
              />
              <!-- english name -->
              <HTextarea
                v-model="form.ar_short_description"
                optional
                name="ar_short_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_short_description"
              />
              <!-- arabic short description -->
              <HTextarea
                v-model="form.en_short_description"
                optional
                name="en_short_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('short_description'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_short_description"
              />
              <!-- en short description -->
              <TextField
                v-model="form.price"
                type="number"
                name="price"
                :placeholder="$t('price')"
                :label="$t('price')"
                :server-error="$page.props.errors.price"
              />
              <!-- tool price per event -->
              <TextField
                v-model="form.SKU"
                label-top-helper="generate SKU ?"
                name="SKU"
                :placeholder="$t('SKU')"
                :label="$t('SKU')"
                :server-error="$page.props.errors.SKU"
                @topHelperAction="generateSKU"
              />
              <!-- tool SKU -->
              <div class="w-full flex h-full items-center space-x-8">
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text font-semibold capitalize"
                      >active</span
                    >
                    <input
                      v-model="form.status"
                      type="radio"
                      name="status"
                      class="radio"
                      value="active"
                    />
                  </label>
                </div>

                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text font-semibold capitalize"
                      >inactive</span
                    >
                    <input
                      v-model="form.status"
                      type="radio"
                      name="status"
                      class="radio"
                      value="inactive"
                    />
                  </label>
                </div>
                <p
                  v-if="$page.props.errors.status"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ $page.props.errors.status }}
                </p>
              </div>
              <!-- status radio  -->
              <div class="mt-4">
                <TextField
                  v-model="form.quantity"
                  type="number"
                  name="quantity"
                  :placeholder="$t('quantity')"
                  :label="$t('quantity')"
                  :server-error="$page.props.errors.quantity"
                />
              </div>
              <!-- tool quantity -->
            </div>
            <!-- === grid === -->
            <div class="mb-8">
              <div class="mb-2 flex space-x-2 tools-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >tool image/s</span
                >
              </div>
              <div class="w-full flex mb-4">
                <div
                  v-show="media.length > 0"
                  class="
                    w-1/2
                    flex flex-col
                    space-y-4
                    transition
                    ht-base-transition
                  "
                >
                  <div
                    v-for="(img, index) in media"
                    :key="index"
                    class="relative flex space-x-2 tools-center"
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
                <div class="w-1/2" :class="uploadFileMargin">
                  <FileUpload @input="uploadToolMedia" />
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
import { reactive, computed } from 'vue'
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import axios from 'axios'
import { useI18n } from 'vue-i18n'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
import FileUpload from '@/Shared/UI/FileUpload'

// TODO:: to fix emit checkbox

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
}

export default {
  name: 'ManageToolCreate',

  components,

  setup() {
    const store = useStore()
    let media = reactive([])
    const { t, locale } = useI18n({ useScope: 'global' })
    const page = usePage()

    const form = useForm({
      ar_name: null,
      ar_short_description: null,
      en_name: null,
      en_short_description: null,
      status: 'active',
      price: null,
      SKU: null,
      quantity: null,
      mediaIds: [],
    })

    const generateSKU = () => {
      const char =
        'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'

      let SKU = '#'

      for (let i = 0; i < 8; i++) {
        SKU += char.charAt(Math.floor(Math.random() * char.length))
      }

      form.SKU = SKU
    }

    const uploadFileMargin = computed(() => {
      let space
      if (locale === 'en') {
        space = media.value.length > 0 ? 'ml-4' : 'ml-0'
      }
      if (locale === 'ar') {
        space = media.value.length > 0 ? 'mr-4' : 'mr-0'
      }

      return space
    })

    const uploadToolMedia = (files) => {
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
          formData.append('directory_name', 'tools')

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

    const createTool = () => {
      form.mediaIds = media.map((img) => img.id)
      form.post(route('manage.tools.store'), {
        preserverState: true,
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

    return {
      form,
      uploadFileMargin,
      uploadToolMedia,
      removeImg,
      createTool,
      media,
      t,
      generateSKU,
    }
  },

  remember: 'form',
}
</script>
