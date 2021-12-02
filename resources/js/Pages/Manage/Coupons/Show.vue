<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.coupons.index')"
        :parent-name="$t('coupons')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? coupon.ar_name : coupon.en_name"
        :action-href="route('manage.coupons.edit', coupon.id)"
        :action-name="
          $t('action_model', { model: $t('coupon'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__coupons-show">
      <pre>{{ coupon }}</pre>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageCouponShow',

  components,

  props: {
    coupon: { type: Object, default: () => ({}) },
  },
}
</script>
