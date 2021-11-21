<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.items.index')"
        :parent-name="$t('items')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? item.ar_name : item.en_name"
        :action-href="route('manage.items.edit', item.id)"
        :action-name="
          $t('action_model', { model: $t('package'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__items-show">
      <div class="flex flex-col space-y-8">
        <div>
          <h2 class="text-xl font-bold capitalize">
            {{ $i18n.locale === "ar" ? item.ar_name : item.en_name }}
          </h2>
          <p class="text-neutral text-opacity-60">
            {{
              $i18n.locale === "ar"
                ? item.ar_short_description
                : item.en_short_description
            }}
          </p>

          <pre>
            {{item}}
          </pre>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import ManageLayout from "@/Layouts/Manage/ManageLayout";
import Breadcrumb from "@/Shared/Layouts/Breadcrumb";

const components = { ManageLayout, Breadcrumb };

export default {
  name: "ManageItemShow",

  components,

  props: {
    item: { type: Object, default: () => ({}) },
  },
};
</script>
