<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.sections.index')"
        :parentName="$t('sections')"
        parentIcon="grid"
        :activeName="
          $t('action_model', { action: $t('edit'), model: $t('section') })
        "
        activeIcon="pen-tool"
      />
    </template>
    <div class="htm-page htm-page__sections-edit">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :formTitle="
              $i18n.locale === 'ar' ? section.ar_name : section.en_name
            "
            :btnTitle="
              $t('action_model', { action: $t('edit'), model: $t('section') })
            "
            @formSubmited="updateSection"
          >
            <TextField
              name="ar_name"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
                  name: $t('name'),
                  lang: $t('the_arabic'),
                })
              "
              :placeholder="form.ar_name"
              :serverError="$page.props.errors.ar_name"
              v-model="form.ar_name"
            />
            <HTextarea
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
              v-model="form.ar_description"
              :serverError="$page.props.errors.ar_description"
            />
            <TextField
              name="en_name"
              :label="
                $t('field_name_lang', {
                  field: $t('section'),
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
                  field: $t('section'),
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
  name: 'ManageSectionEdit',

  components,

  props: {
    section: Object,
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
