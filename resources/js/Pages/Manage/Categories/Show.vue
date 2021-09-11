<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.categories.index')"
        :parentName="$t('categories')"
        parentIcon="grid"
        :activeName="
          $i18n.locale === 'ar' ? category.ar_name : category.en_name
        "
        :actionHref="route('manage.categories.edit', category.id)"
        :actionName="
          $t('action_model', { model: $t('category'), action: $t('edit') })
        "
        actionIcon="edit"
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
    category: Object,
  },
}
</script>
