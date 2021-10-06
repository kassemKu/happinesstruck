<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.categories.index')"
        :parent-name="$t('categories')"
        parent-icon="grid"
        :active-name="
          $i18n.locale === 'ar' ? category.ar_name : category.en_name
        "
        :action-href="route('manage.categories.edit', category.id)"
        :action-name="
          $t('action_model', { model: $t('category'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__categories-show">
      <pre>{{ category }}</pre>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageCategoryShow',

  components,

  props: {
    category: { type: Object, default: () => ({}) },
  },
}
</script>
