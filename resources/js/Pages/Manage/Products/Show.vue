<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.products.index')"
        :parent-name="$t('products')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? product.ar_name : product.en_name"
        :action-href="route('manage.products.edit', product.id)"
        :action-name="
          $t('action_model', { model: $t('product'), action: $t('edit') })
        "
        action-icon="edit"
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
    product: { type: Object, default: () => ({}) },
  },
}
</script>
