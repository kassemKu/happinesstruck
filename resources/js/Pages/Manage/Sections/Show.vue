<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.sections.index')"
        :parentName="$t('sections')"
        parentIcon="grid"
        :activeName="$i18n.locale === 'ar' ? section.ar_name : section.en_name"
        :actionHref="route('manage.sections.edit', section.id)"
        :actionName="
          $t('action_model', { model: $t('section'), action: $t('edit') })
        "
        actionIcon="edit"
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
    section: Object,
  },
}
</script>
