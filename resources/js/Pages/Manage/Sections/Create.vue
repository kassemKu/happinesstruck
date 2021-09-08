<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.sections.index')"
        :parentName="$t('sections')"
        parentIcon="grid"
        :activeName="
          $t('action_model', { action: $t('add'), model: $t('section') })
        "
        activeIcon="pen-tool"
      />
    </template>
    <div class="ht-page htm-page htm-page__sections-create">
      <div class="htm-manage-section">
        <div class="htm-manage-section-action">
          <ManageForm
            :formTitle="
              $t('action_model', { action: $t('add'), model: $t('section') })
            "
            :btnTitle="
              $t('action_model', { action: $t('add'), model: $t('section') })
            "
            @formSubmited="createSection"
          >
            <TextField
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
              :serverError="$page.props.errors.ar_name"
              v-model="form.ar_name"
            />
            <HTextarea
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
              :serverError="$page.props.errors.ar_description"
              v-model="form.ar_description"
            />
            <TextField
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
              :serverError="$page.props.errors.en_name"
              v-model="form.en_name"
            />
            <HTextarea
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
              :serverError="$page.props.errors.en_description"
              v-model="form.en_description"
            />
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

const components = {
  ManageLayout,
  Breadcrumb,
  TextField,
  ManageForm,
  HTextarea,
}

export default {
  name: 'ManageSectionCreate',

  components,

  data() {
    return {
      form: this.$inertia.form({
        ar_name: '',
        ar_description: '',
        en_name: '',
        en_description: '',
      }),
    }
  },

  remember: 'form',

  methods: {
    createSection() {
      console.log(this.form)
      this.form.post(this.route('manage.sections.store'))
    },
  },
}
</script>
