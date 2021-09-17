<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parentHref="route('manage.products.index')"
        :parentName="$t('products')"
        parentIcon="grid"
        :activeName="$i18n.locale === 'ar' ? product.ar_name : product.en_name"
        :actionHref="route('manage.products.edit', product.id)"
        :actionName="
          $t('action_model', { model: $t('product'), action: $t('edit') })
        "
        actionIcon="edit"
      />
    </template>
    <div class="htm-page htm-page__products-show">
      <pre>{{ product }}</pre>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageProductShow',

  components,

  props: {
    product: Object,
  },
}
</script>
