<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.packages.index')"
        :parent-name="$t('packages')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('package') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__packages-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('package') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('package') })
            "
            max-width="6xl"
            @formSubmitted="createPackage"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('package'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('package'),
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
                    field: $t('package'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('package'),
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
              <HTextarea
                v-model="form.ar_description"
                optional
                name="ar_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_description"
              />
              <!-- arabic description -->
              <HTextarea
                v-model="form.en_description"
                optional
                name="en_description"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('description'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_description"
              />
              <!-- en description -->
              <TextField
                v-model="form.price_per_event"
                type="number"
                name="price_per_event"
                :placeholder="$t('price_per_event')"
                :label="$t('price_per_event')"
                :server-error="$page.props.errors.price_per_event"
              />
              <!-- package price per event -->
              <div class="w-full flex space-x-8 justify-end">
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
            </div>
            <!-- === grid === -->
            <div class="w-full flex justify-center">
              <button
                type="button"
                class="
                  btn
                  border-info
                  text-info
                  space-x-2
                  bg-transparent
                  border-2
                  hover:text-base-100 hover:bg-info hover:border-info
                "
                @click.prevent="openAddPackageToolsPopUp"
              >
                <VueFeather type="plus" stroke-width="3" class="w-5 h-5" />
                <span>add tools to this package</span>
              </button>
            </div>
            <!-- add tools button -->
            <div class="mt-6 mb-8">
              <div class="mb-2 flex space-x-2 items-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >package image/s</span
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
                <div class="w-1/2" :class="uploadFileMargin">
                  <FileUpload @input="uploadPackageMedia" />
                </div>
              </div>
            </div>
            <!-- Media uploader -->
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
  <Modal
    max-width="screen-lg"
    :title="`add tools to this package`"
    type="info"
    action-title="save selected tools and close"
    screen-height
    :disabled-action-btn="form.tools.length === 0"
    @modalAction="savePackageToolsAndClose"
  >
    <div class="grid grid-cols-4 gap-8 text-sm">
      <div v-for="tool in tools" :key="tool.id">
        <div class="flex flex-col space-y-2 font-medium">
          <div
            class="
              max-w-sm
              flex
              items-center
              justify-between
              bg-base-300 bg-opacity-60
              rounded-btn
              h-10
            "
            :class="{
              'border-2 border-info': selectedTool(tool),
            }"
          >
            <button
              type="button"
              class="
                h-full
                w-8
                flex
                items-center
                justify-center
                bg-base-300 bg-opacity-30
                flex-grow
              "
              :class="
                selectedTool(tool) ? 'cursor-pointer' : 'cursor-not-allowed'
              "
              @click="addToolToPackage(tool)"
            >
              <VueFeather type="plus" stroke-width="3" class="w-4 h-4" />
            </button>
            <p
              class="
                uppercase
                flex-shrink
                px-2
                h-full
                flex
                items-center
                space-x-1
              "
            >
              <span class="text-xs font-semibold">quantity</span>
              <span class="font-bold text-lg uppercase text-info">{{
                getToolsQuantity(tool)
              }}</span>
            </p>
            <button
              type="button"
              class="
                h-full
                w-8
                flex
                items-center
                justify-center
                bg-base-300 bg-opacity-30
                flex-grow
              "
              :class="
                selectedTool(tool) ? 'cursor-pointer' : 'cursor-not-allowed'
              "
              @click.prevent="removeTollFromPackage(tool)"
            >
              <VueFeather type="minus" stroke-width="3" class="w-4 h-4" />
            </button>
          </div>
          <div
            class="flex items-center relative rounded-box group"
            :class="{ 'border-2 border-info': selectedTool(tool) }"
          >
            <img
              v-if="tool.media.length > 0"
              :src="tool.media[0].full_url"
              :alt="tool.en_name"
              class="w-full h-48 object-cover rounded-box"
            />
            <div
              v-show="!selectedTool(tool)"
              class="
                absolute
                inset-0
                bg-base-300 bg-opacity-80
                items-center
                justify-center
                rounded-box
                hidden
                group-hover:flex
              "
            >
              <button
                type="button"
                class="
                  btn btn-outline
                  border-2 border-info
                  btn-circle
                  text-info
                  hover:bg-info hover:border-info
                "
                @click.prevent="addToolToPackage(tool)"
              >
                <VueFeather type="plus" stroke-width="3" class="w-4 h-4" />
              </button>
            </div>
          </div>
          <div class="flex flex-col space-y-2 items-center">
            <p class="capitalize">{{ tool.en_name }}</p>
          </div>
        </div>
      </div>
    </div>
  </Modal>
</template>

<script>
import { reactive, computed, onMounted } from 'vue'
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
import Modal from '@/Shared/Layouts/Modal'

// TODO:: to fix emit checkbox

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  Modal,
}

export default {
  name: 'ManagePackageCreate',

  components,

  props: {
    trucks: {
      type: Array,
      default: () => [],
    },
    tools: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    const store = useStore()
    let media = reactive([])
    const { t, locale } = useI18n({ useScope: 'global' })
    const page = usePage()

    const form = useForm({
      ar_name: null,
      ar_short_description: null,
      ar_description: null,
      en_name: null,
      en_short_description: null,
      en_description: null,
      status: 'active',
      price_per_event: null,
      mediaIds: [],
      tools: [],
    })

    const addToolToPackage = (tool) => {
      form.tools.push(tool)
    }

    const removeTollFromPackage = (tool) => {
      form.tools.splice(form.tools.indexOf(tool), 1)
    }

    const selectedTool = (tool) => {
      return form.tools.includes(tool)
    }

    const getToolsQuantity = (tool) => {
      if (!selectedTool(tool)) return 0
      const quantity = form.tools.filter((i) => i.id == tool.id)

      tool.quantity_per_package = quantity.length

      return quantity.length
    }

    const savePackageToolsAndClose = () => {
      store.commit('closeModal')
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

    const uploadPackageMedia = (files) => {
      Array.from(files).forEach((file) => {
        let reader = new FileReader()

        reader.readAsDataURL(file)

        reader.onload = (e) => {
          let item = {
            url: e.target.result,
            id: undefined,
            originName: file.name,
            size: (file.size / 1048576).toFixed(2) + ' MB',
          }

          let formData = new FormData()

          formData.append('file', file)
          formData.append('directory_name', 'packages')

          axios
            .post(route('manage.media.store'), formData)
            .then((res) => {
              item.id = res.data.id
            })
            .then(() => {
              store.commit('openNotification', {
                title: 'upload file',
                content: `package image uploaded successfully`,
              })
            })

          media.push(item)
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
              content: `package image deleted successfully`,
            })
          })
      }
    }

    const createPackage = () => {
      form.mediaIds = media.map((img) => img.id)
      form.post(route('manage.packages.store'), {
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
            page.props.errors &&
            Object.keys(page.props.errors).length === 0
          ) {
            form.reset()
            media = []
            form.mediaIds = []
            store.commit('openNotification', {
              title: 'create package',
              type: 'success',
              content: 'package created successfully',
            })
          }
        },
      })
    }

    const openAddPackageToolsPopUp = () => {
      store.commit('openModal')
    }

    onMounted(() => {
      form.tools = []
    })

    return {
      form,
      uploadFileMargin,
      uploadPackageMedia,
      removeImg,
      createPackage,
      media,
      t,
      openAddPackageToolsPopUp,
      addToolToPackage,
      removeTollFromPackage,
      selectedTool,
      getToolsQuantity,
      savePackageToolsAndClose,
    }
  },

  remember: 'form',
}
</script>
