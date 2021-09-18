<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.categories.index')"
        :parentName="$t('categories')"
        parentIcon="grid"
        :activeName="
          $t('action_model', { action: $t('add'), model: $t('category') })
        "
        activeIcon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__categories-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :formTitle="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
            :btnTitle="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
            @formSubmited="updateCategory"
          >
            <TextField
              name="ar_name"
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :placeholder="form.ar_name"
              v-model="form.ar_name"
              :serverError="$page.props.errors.ar_name"
            />
            <HTextarea
              optional
              name="ar_description"
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :placeholder="form.ar_description"
              v-model="form.ar_description"
              :serverError="$page.props.errors.ar_description"
            />
            <TextField
              name="en_name"
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :placeholder="form.en_name"
              v-model="form.en_name"
              :serverError="$page.props.errors.en_name"
            />
            <HTextarea
              optional
              name="en_description"
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :placeholder="form.en_description"
              v-model="form.en_description"
              :serverError="$page.props.errors.en_description"
            />
            <div class="mb-8">
              <div class="form-control">
                <label class="cursor-pointer label justify-start space-x-2">
                  <input
                    type="checkbox"
                    class="checkbox"
                    v-model="form.published"
                    :checked="form.published"
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
          </ManageForm>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import TextField from '@/Shared/UI/TextField'
import ManageForm from '@/Shared/Layouts/MForm'
import HTextarea from '@/Shared/UI/HTextarea'
// TODO:: to fix emit checkbox
// import CheckBox from '@/Shared/UI/CheckBox'

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
  // CheckBox,
}

export default {
  name: 'ManageCategoryCreate',

  components,

  props: {
    category: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        ar_name: this.category.ar_name,
        ar_description: this.category.ar_description,
        en_name: this.category.en_name,
        en_description: this.category.en_description,
        published: this.category.published,
      }),
    }
  },

  remember: 'form',

  methods: {
    updateCategory() {
      this.form.put(this.route('manage.categories.update', this.category), {
        onError: console.log('error update category'),
        onSuccess: console.log('success update category'),
        onFinish: console.log('finish update category'),
      })
    },
  },
}
</script>
