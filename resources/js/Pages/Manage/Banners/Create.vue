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
            :btn-title="
              $t('action_model', { action: $t('add'), model: $t('category') })
            "
            @formSubmitted="createCategory"
          >
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
        ar_summary: null,
        en_name: null,
        en_summary: null,
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
