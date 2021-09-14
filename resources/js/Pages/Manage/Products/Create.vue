<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.products.index')"
        :parentName="$t('products')"
        parentIcon="grid"
        :activeName="
          $t('action_model', { action: $t('add'), model: $t('product') })
        "
        activeIcon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__products-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :formTitle="
              $t('action_model', { action: $t('add'), model: $t('product') })
            "
            :btnTitle="
              $t('action_model', { action: $t('add'), model: $t('product') })
            "
            @formSubmited="createProduct"
            maxWidth="3xl"
          >
            <TextField
              name="ar_name"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :serverError="$page.props.errors.ar_name"
              v-model="form.ar_name"
            />
            <HTextarea
              optional
              name="ar_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :serverError="$page.props.errors.ar_description"
              v-model="form.ar_description"
            />
            <TextField
              name="en_name"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :serverError="$page.props.errors.en_name"
              v-model="form.en_name"
            />
            <HTextarea
              optional
              name="en_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('product'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :serverError="$page.props.errors.en_description"
              v-model="form.en_description"
            />
            <!-- en description -->
            <div class="w-full flex space-x-4 mb-8">
              <div
                class="
                  w-1/2
                  flex flex-col
                  space-y-4
                  transition
                  ht-base-transition
                "
                v-show="images.length > 0"
              >
                <div
                  v-for="(img, index) in images"
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
                        "
                      >
                        <span>{{ img.originName }}</span>
                        <span class="text-base-300">{{ img.size }}</span>
                      </div>
                    </div>
                    <progress class="progress" value="100" max="100"></progress>
                  </div>
                </div>
              </div>
              <div class="w-1/2">
                <FileUpload @input="uploadProductImages" />
              </div>
            </div>
            <!-- images uplaoder -->
            <div class="mb-8">
              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <input
                    type="checkbox"
                    class="checkbox"
                    name="publish"
                    v-model="form.published"
                  />
                  <span class="label-text text-sm font-semibold capitalize"
                    >publish</span
                  >
                </label>
              </div>
              <p
                class="text-xs text-red-500 font-bold"
                v-if="form.errors.published"
              >
                {{ form.errors.published }}
              </p>
            </div>
            <!-- published checkbox -->
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
  name: 'ManageProductCreate',

  components,

  data() {
    return {
      form: this.$inertia.form({
        ar_name: null,
        ar_short_description: null,
        ar_description: null,
        en_name: null,
        en_short_description: null,
        en_description: null,
        published: true,
      }),

      images: [],
    }
  },

  remember: 'form',

  methods: {
    createProduct() {
      this.form.post(this.route('manage.products.store'))
    },
    uploadProductImages(files) {
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
          formData.append('directory_name', 'products')

          axios.post(route('manage.media.store'), formData).then((res) => {
            item.id = res.data.id
          })

          this.images.push(item)
        }
      })
    },
    removeImg(index, img) {
      this.images.splice(index, 1)

      if (img.id) {
        axios.delete(route('manage.media.destroy', img.id)).catch((error) => {
          console.log(error)
          this.images.splice(index, 0, img)
        })
      }
    },
  },
}
</script>

<style>
.progress {
  height: 0.3rem;
}
</style>
