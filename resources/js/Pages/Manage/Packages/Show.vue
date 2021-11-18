<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.packages.index')"
        :parent-name="$t('packages')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? packg.ar_name : packg.en_name"
        :action-href="route('manage.packages.edit', packg.id)"
        :action-name="
          $t('action_model', { model: $t('package'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__packages-show">
      <div class="flex flex-col space-y-8">
        <div>
          <h2 class="text-xl font-bold capitalize">
            {{ $i18n.locale === "ar" ? packg.ar_name : packg.en_name }}
          </h2>
          <p class="text-neutral text-opacity-60">
            {{
              $i18n.locale === "ar"
                ? packg.ar_short_description
                : packg.en_short_description
            }}
          </p>

          <pre>
              {{ packg }}
           </pre
          >
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
  name: "ManagePackageShow",

  components,

  props: {
    packg: { type: Object, default: () => ({}) },
  },
};
</script>
