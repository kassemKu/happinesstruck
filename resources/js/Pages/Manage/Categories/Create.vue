<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.categories.index')"
        :parent-name="$t('categories')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('category') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__categories-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
            max-width="5xl"
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
            :loading="loading"
            @formSubmitted="createCategory"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_name"
              />
              <TextField
                v-model="form.en_name"
                name="en_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_name"
              />
              <HTextarea
                v-model="form.ar_summary"
                optional
                name="ar_summary"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('summary'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('summary'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_summary"
              />
              <HTextarea
                v-model="form.en_summary"
                optional
                name="en_summary"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('summary'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('category'),
                    name: $t('summary'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_summary"
              />
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
                  <FileUpload @input="uploadProductMedia" />
                </div>
              </div>
            </div>
            <!-- Media uploader -->
            <div class="mb-8 flex space-x-8">
              <div>
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
              <div>
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      v-model="form.is_parent"
                      type="checkbox"
                      class="checkbox"
                      :checked="form.is_parent"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >is parent category ?</span
                    >
                  </label>
                </div>
                <p
                  v-if="form.errors.published"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ form.errors.is_parent }}
                </p>
              </div>
            </div>
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import axios from 'axios'
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
  name: 'ManageCategoryCreate',

  components,

  data() {
    return {
      form: this.$inertia.form({
        ar_name: null,
        ar_summary: null,
        en_name: null,
        en_summary: null,
        published: true,
        is_parent: true,
        mediaIds: [],
      }),
      loading: false,
      media: [],
    }
  },

  remember: 'form',

  computed: {
    uploadFileMargin() {
      let space
      if (this.$i18n.locale === 'en') {
        space = this.media.length > 0 ? 'ml-4' : 'ml-0'
      }
      if (this.$i18n.locale === 'ar') {
        space = this.media.length > 0 ? 'mr-4' : 'mr-0'
      }

      return space
    },
  },

  methods: {
    uploadProductMedia(files) {
      this.loading = true
      Array.from(files).forEach((media) => {
        let reader = new FileReader()

        reader.readAsDataURL(media)

        reader.onload = async (e) => {
          let item = {
            url: e.target.result,
            id: undefined,
            originName: media.name,
            size: (media.size / 1048576).toFixed(2) + ' MB',
          }

          let formData = new FormData()

          formData.append('file', media)
          formData.append('directory_name', 'categories')

          await axios
            .post(route('manage.media.store'), formData)
            .then((res) => {
              item.id = res.data.id
            })
            .then(() => {
              this.$store.commit('openNotification', {
                title: 'upload file',
                content: `category image uploaded successfully`,
              })
            })
            .then(() => {
              this.media.push(item)
              this.loading = false
            })
            .catch((error) => {
              console.log(error)
              this.loading = false
            })
        }
      })
    },
    // remove image
    async removeImg(index, img) {
      this.loading = true

      if (img.id) {
        await axios
          .delete(route('manage.media.destroy', img.id))
          .then(() => {
            this.media.splice(index, 1)
            this.$store.commit('openNotification', {
              title: 'delete file',
              content: `category image deleted successfully`,
            })
            this.loading = false
          })
          .catch((error) => {
            this.loading = false
            console.log(error)
          })
      }
    },
    // create category
    createCategory() {
      this.form.mediaIds = this.media.map((img) => img.id)
      this.form.post(this.route('manage.categories.store'), {
        preserverState: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onSuccess: () => {
          if (Object.keys(this.$page.props.errors).length === 0) {
            this.form.reset()
            this.media = []
            this.form.mediaIds = []
          }
        },
      })
    },
  },
}
</script>
