<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.sections.index')"
        :parent-name="$t('sections')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? section.ar_name : section.en_name"
        :action-href="route('manage.sections.edit', section.id)"
        :action-name="
          $t('action_model', { model: $t('section'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__sections-show">
      <pre>{{ section }}</pre>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageSectionShow',

  components,

  props: {
    section: {
      type: Object,
      default: () => ({}),
    },
  },
}
</script>
