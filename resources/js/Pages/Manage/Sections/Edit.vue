<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.sections.index')"
        :parent-name="$t('sections')"
        parent-icon="grid"
        :active-name="
          $t('action_model', { action: $t('edit'), model: $t('section') })
        "
        active-icon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__sections-edit">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :form-title="
              $i18n.locale === 'ar' ? section.ar_name : section.en_name
            "
            :btn-title="
              $t('action_model', { action: $t('edit'), model: $t('section') })
            "
            @formSubmited="updateSection"
          >
            <TextField
              v-model="form.ar_name"
              name="ar_name"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :placeholder="form.ar_name"
              :server-error="$page.props.errors.ar_name"
            />
            <HTextarea
              v-model="form.ar_description"
              optional
              name="ar_description"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_arabic'),
                })
              "
              :placeholder="form.ar_description"
              :server-error="$page.props.errors.ar_description"
            />
            <TextField
              v-model="form.en_name"
              name="en_name"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_english'),
                })
              "
              :placeholder="form.en_name"
              :server-error="$page.props.errors.en_name"
            />
            <HTextarea
              v-model="form.en_description"
              optional
              name="en_description"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('description'),
                  lang: $t('the_english'),
                })
              "
              :placeholder="form.en_description"
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
  name: 'ManageSectionEdit',

  components,

  props: {
    section: { type: Object, default: () => ({}) },
  },

  data() {
    return {
      form: this.$inertia.form({
        ar_name: this.section.ar_name,
        ar_description: this.section.ar_description,
        en_name: this.section.en_name,
        en_description: this.section.en_description,
        published: this.section.published,
      }),
    }
  },

  remember: 'form',

  methods: {
    updateSection() {
      this.form.put(this.route('manage.sections.update', this.section.id))
    },
  },
}
</script>
