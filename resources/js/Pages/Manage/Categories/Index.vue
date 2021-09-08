<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :activeName="$t('categories')"
        activeIcon="grid"
        :actionName="
          $t('action_model', { model: $t('category'), action: $t('add') })
        "
        :actionHref="route('manage.categories.create')"
      />
    </template>
    <div class="ht-page htm-page htm-page__categories-index">
      categories index page
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageCategoriesIndex',

  components,
}
</script>
