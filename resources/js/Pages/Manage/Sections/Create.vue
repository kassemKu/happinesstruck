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
  name: 'ManageSectionCreate',

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
    createSection() {
      this.form.post(this.route('manage.sections.store'))
    },
  },
}
</script>
