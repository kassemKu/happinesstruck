<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :activeName="$t('sections')"
        activeIcon="grid"
        :actionName="
          $t('action_model', { model: $t('section'), action: $t('add') })
        "
        :actionHref="route('manage.sections.create')"
      />
    </template>
    <div class="ht-page htm-page htm-page__sections-index">
      sections index page
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageSectionsIndex',

  components,
}
</script>
