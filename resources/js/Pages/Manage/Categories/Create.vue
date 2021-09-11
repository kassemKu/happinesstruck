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
            @formSubmited="createCategory"
          >
            <TextField
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
              :serverError="$page.props.errors.ar_name"
              v-model="form.ar_name"
            />
            <HTextarea
              optional
              name="ar_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
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
              :serverError="$page.props.errors.en_name"
              v-model="form.en_name"
            />
            <HTextarea
              optional
              name="en_description"
              :placeholder="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :label="
                $t('field_name_lang', {
                  field: $t('category'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :serverError="$page.props.errors.en_description"
              v-model="form.en_description"
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

  data() {
    return {
      form: this.$inertia.form({
        ar_name: null,
        ar_description: null,
        en_name: null,
        en_description: null,
        published: true,
      }),
    }
  },

  remember: 'form',

  methods: {
    createCategory() {
      this.form.post(this.route('manage.categories.store'))
    },
  },
}
</script>
