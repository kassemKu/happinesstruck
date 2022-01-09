<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :parent-href="route('manage.sections.index')"
        :parent-name="$t('sections')"
        parent-icon="grid"
        :active-name="$i18n.locale === 'ar' ? section.ar_name : section.en_name"
        :action-href="route('manage.sections.edit', section.id)"
        :action-name="
          $t('action_model', { model: $t('section'), action: $t('edit') })
        "
        action-icon="edit"
      />
    </template>
    <div class="htm-page htm-page__sections-show">
      <div class="grid grid-cols-2 gap-8" :class="section.media.length > 0">
        <div class="flex flex-col space-y-4">
          <img
            :src="section.media[0].full_url"
            :alt="section.en_name"
            class="w-full h-96 object-cover mask mask-squircle"
          />
          <div
            v-if="section.media.length > 0"
            class="flex items-center space-x-2 justify-center"
          >
            <button v-for="(img, index) in section.media" :key="index">
              <img
                :src="img.full_url"
                :alt="section.en_name"
                class="w-16 h-16 object-cover mask mask-squircle"
              />
            </button>
          </div>
        </div>
        <div class="flex flex-col space-y-8">
          <div class="flex flex-col space-y-2">
            <h3 class="text-2xl capitalize font-bold">
              {{ $i18n.locale === 'ar' ? section.ar_name : section.en_name }}
              <div
                class="badge ml-2 rtl:mr-2 p-2"
                :class="section.published ? 'badge-accent' : 'badge-secondary'"
              >
                {{ section.published ? $t('published') : $t('unpublished') }}
              </div>
            </h3>
            <div class="flex space-x-2">
              <p class="text-gray-400 font-semibold">
                {{ $t('created_at') }}
                <span class="text-info rtl:mr-1">{{ section.created_at }}</span>
              </p>
            </div>
          </div>
          <div>
            <p
              v-if="section.en_description && $i18n.locale === 'en'"
              class="text-gray-500 capitalize"
            >
              {{ section.en_description }}
            </p>
            <p
              v-if="section.ar_description && $i18n.locale === 'ar'"
              class="text-gray-500 capitalize"
            >
              {{ section.ar_description }}
            </p>
          </div>
        </div>
      </div>
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
    section: {
      type: Object,
      default: () => ({}),
    },
  },
}
</script>
