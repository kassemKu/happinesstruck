<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.items.index')"
        :parent-name="$t('package_items')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('add'), model: $t('item') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__items-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $t('action_model', { action: $t('add'), model: $t('item') })
            "
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('item') })
            "
            max-width="5xl"
            @formSubmited="createItem"
          >
            <div class="grid grid-cols-2 gap-x-10 items-center">
              <TextField
                v-model="form.ar_name"
                name="ar_name"
                :placeholder="
                  $t('field_name_lang', {
                    field: $t('item'),
                    name: $t('name'),
                    lang: $t('the_arabic'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('item'),
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
                    field: $t('item'),
                    name: $t('name'),
                    lang: $t('the_english'),
                  })
                "
                :label="
                  $t('field_name_lang', {
                    field: $t('item'),
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
              <!-- item price per event -->
              <TextField
                v-model="form.SKU"
                label-top-helper="generate SKU ?"
                name="SKU"
                :placeholder="$t('SKU')"
                :label="$t('SKU')"
                :server-error="$page.props.errors.SKU"
              />
              <!-- item SKU -->
              <div class="w-full flex space-x-8">
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <span class="label-text font-semibold capitalize"
                      >active</span
                    >
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
                    <span class="label-text font-semibold capitalize"
                      >inactive</span
                    >
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
                  v-if="$page.props.errors.status"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ $page.props.errors.status }}
                </p>
              </div>
              <!-- status radio  -->
              <div>
                <div class="form-control">
                  <label class="cursor-pointer label justify-start space-x-2">
                    <input
                      v-model="form.featured"
                      type="checkbox"
                      class="checkbox"
                      name="featured"
                    />
                    <span class="label-text text-sm font-semibold capitalize"
                      >featured item?</span
                    >
                  </label>
                </div>
                <p
                  v-if="$page.props.errors.featured"
                  class="text-xs text-red-500 font-bold"
                >
                  {{ $page.props.errors.featured }}
                </p>
              </div>
              <!-- featured item checkbox -->
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
              <!-- item quantity -->
            </div>
            <!-- === grid === -->
            <div class="mb-8">
              <div class="mb-2 flex space-x-2 items-center">
                <VueFeather
                  type="image"
                  stroke-width="2.5"
                  class="text-gray-400"
                />
                <span class="label-text capitalize font-semibold"
                  >item image/s</span
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
                  <FileUpload @input="uploadItemMedia" />
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
import { reactive, computed } from "vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { useStore } from "vuex";
import axios from "axios";
import { useI18n } from "vue-i18n";
import Multiselect from "@vueform/multiselect";
import ManageLayout from "@/Layouts/Manage/ManageLayout";
import Breadcrumb from "@/Shared/Layouts/Breadcrumb";
import TextField from "@/Shared/UI/TextField";
import ManageForm from "@/Shared/Layouts/MForm";
import HTextarea from "@/Shared/UI/HTextarea";
import FileUpload from "@/Shared/UI/FileUpload";

// TODO:: to fix emit checkbox

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  FileUpload,
  Multiselect,
};

export default {
  name: "ManageItemCreate",

  components,

  props: {
    // eslint-disable-next-line vue/require-default-prop
    trucks: {
      type: Array,
    },
  },

  setup() {
    const store = useStore();
    let media = reactive([]);
    const { t, locale } = useI18n({ useScope: "global" });
    const page = usePage();

    const form = useForm({
      ar_name: null,
      ar_short_description: null,
      ar_description: null,
      en_name: null,
      en_short_description: null,
      en_description: null,
      status: "active",
      price_per_event: null,
      SKU: null,
      quantity: null,
      featured: false,
      mediaIds: [],
    });

    const uplaodFileMargin = computed(() => {
      let space;
      if (locale === "en") {
        space = media.value.length > 0 ? "ml-4" : "ml-0";
      }
      if (locale === "ar") {
        space = media.value.length > 0 ? "mr-4" : "mr-0";
      }

      return space;
    });

    const uploadItemMedia = (files) => {
      Array.from(files).forEach((file) => {
        let reader = new FileReader();

        reader.readAsDataURL(file);

        reader.onload = (e) => {
          let item = {
            url: e.target.result,
            id: undefined,
            originName: file.name,
            size: (file.size / 1048576).toFixed(2) + " MB",
          };

          let formData = new FormData();

          formData.append("file", file);
          formData.append("directory_name", "items");

          axios
            .post(route("manage.media.store"), formData)
            .then((res) => {
              item.id = res.data.id;
            })
            .then(() => {
              store.commit("openNotification", {
                title: "upload file",
                content: `item image uploaded successfully`,
              });
            });

          media.push(item);
        };
      });
    };

    const removeImg = (index, img) => {
      media.splice(index, 1);

      if (img.id) {
        axios
          .delete(route("manage.media.destroy", img.id))
          .catch((error) => {
            console.log(error);
            media.splice(index, 0, img);
          })
          .then(() => {
            store.commit("openNotification", {
              title: "delete file",
              content: `item image deleted successfully`,
            });
          });
      }
    };

    const createItem = () => {
      form.mediaIds = media.map((img) => img.id);
      form.post(route("manage.items.store"), {
        preserverStae: true,
        onStart: () => console.log("Do Something on start"),
        onFinish: () => console.log("Do Something on finish"),
        onError: (errors) => {
          store.commit("openNotification", {
            title: "something went wrong",
            type: "error",
            content: errors,
          });
        },
        onSuccess: () => {
          if (
            page.props.errors &&
            Object.keys(page.props.errors).length === 0
          ) {
            form.reset();
            media = [];
            form.mediaIds = [];
            store.commit("openNotification", {
              title: "create producut",
              type: "success",
              content: "item created successfully",
            });
          }
        },
      });
    };

    return {
      form,
      uplaodFileMargin,
      uploadItemMedia,
      removeImg,
      createItem,
      media,
      t,
    };
  },

  remember: "form",
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
