<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.trucks.index')"
        :parent-name="$t('trucks')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('truck') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__trucks-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('truck') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('truck') })
            "
            max-width="5xl"
            @formSubmited="createTruck"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('truck'),
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
                    field: $t('truck'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_name"
              />
              <!-- english name -->
              <TextField
                v-model="form.ar_type"
                name="ar_type"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('type'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('type'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_type"
              />
              <!-- arabic type -->
              <TextField
                v-model="form.en_type"
                name="en_type"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('type'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('truck'),
                    name: $t('type'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_type"
              />
              <!-- english type -->
              <TextField
                v-model="form.size"
                name="size"
                :placeholder="$t('size')"
                :label="$t('size')"
                :server-error="$page.props.errors.size"
              />
              <!-- size -->
              <div class="md:mt-4 w-full flex space-x-8">
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text">active</span>
                    <input
                      v-model="form.status"
                      type="radio"
                      name="status"
                      checked="checked"
                      class="radio"
                      value="active"
                    />
                  </label>
                </div>

                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text">inactive</span>
                    <input
                      v-model="form.status"
                      type="radio"
                      name="status"
                      checked="checked"
                      class="radio"
                      value="inactive"
                    />
                  </label>
                </div>

                <p
                  v-if="form.errors.status"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ form.errors.status }}
                </p>
              </div>
              <!-- status radio  -->
              <HTextarea
                v-model="form.ar_note"
                optional
                name="ar_note"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('note'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('note'),
                    lang: $t('the_arabic'),
                  })
                "
                :server-error="$page.props.errors.ar_note"
              />
              <!-- arabic short description -->
              <HTextarea
                v-model="form.en_note"
                optional
                name="en_note"
                :placeholder="
                  $t('field_name_lang', {
                    name: $t('note'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    name: $t('note'),
                    lang: $t('the_english'),
                  })
                "
                :server-error="$page.props.errors.en_note"
              />
            </div>
            <!-- === grid === -->
            <div class="mb-6">
              <div class="mb-2 flex space-x-2 items-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >truck image/s</span
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
                <div class="w-1/2" :class="uplaodFileMargin">
                  <FileUpload @input="uploadTruckMedia" />
                </div>
              </div>
            </div>
            <!-- Media uplaoder -->
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

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
}

export default {
  name: 'ManagetruckCreate',

  components,

  data() {
    return {
      form: this.$inertia.form({
        ar_name: null,
        ar_note: null,
        en_name: null,
        en_note: null,
        ar_type: null,
        en_type: null,
        size: null,
        status: 'active',
        mediaIds: [],
      }),
      media: [],
    }
  },

  remember: 'form',

  computed: {
    uplaodFileMargin() {
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
    uploadTruckMedia(files) {
      Array.from(files).forEach((media) => {
        let reader = new FileReader()

        reader.readAsDataURL(media)

        reader.onload = (e) => {
          let item = {
            url: e.target.result,
            id: undefined,
            originName: media.name,
            size: (media.size / 1048576).toFixed(2) + ' MB',
          }

          let formData = new FormData()

          formData.append('file', media)
          formData.append('directory_name', 'trucks')

          axios
            .post(route('manage.media.store'), formData)
            .then((res) => {
              item.id = res.data.id
            })
            .then(() => {
              this.$store.commit('openNotification', {
                title: 'upload file',
                content: `truck image uploaded successfully`,
              })
            })

          this.media.push(item)
        }
      })
    },
    removeImg(index, img) {
      this.media.splice(index, 1)

      if (img.id) {
        axios
          .delete(route('manage.media.destroy', img.id))
          .catch((error) => {
            console.log(error)
            this.media.splice(index, 0, img)
          })
          .then(() => {
            this.$store.commit('openNotification', {
              title: 'delete file',
              content: `truck image deleted successfully`,
            })
          })
      }
    },
    createTruck() {
      this.form.mediaIds = this.media.map((img) => img.id)
      this.form.post(this.route('manage.trucks.store'), {
        preserverStae: true,
        onStart: () => console.log('Do Something on start'),
        onFinish: () => console.log('Do Something on finish'),
        onError: (errors) => {
          this.$store.commit('openNotification', {
            title: 'something went wrong',
            type: 'error',
            content: errors,
          })
        },
        onSuccess: () => {
          if (Object.keys(this.$page.props.errors).length === 0) {
            this.form.reset()
            this.media = []
            this.form.mediaIds = []
            this.$store.commit('openNotification', {
              title: 'create truck',
              type: 'success',
              content: 'truck created successfully',
            })
          }
        },
      })
    },
  },
}
</script>
