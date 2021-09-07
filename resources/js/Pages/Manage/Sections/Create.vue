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
      <div class="htm-manage-section rounded-sm">
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
            />
            <TextField
              isTextarea
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
            />
            <TextField
              isTextarea
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

const components = { ManageLayout, Breadcrumb, TextField, ManageForm }

export default {
  name: 'ManageSectionCreate',

  components,

  methods: {
    createSection() {
      console.log('DONE')
    },
  },
}
</script>
