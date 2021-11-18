<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('banners')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('banner'), action: $t('add') })
        "
        :action-href="route('manage.banners.create')"
      />
    </template>
    <div class="htm-page htm-page__banners-index">
      <div class="htm-table-container flex flex-col space-y-8">
        <div class="htm-searsh-filter">
          <SearchFilter />
        </div>
        <div class="htm-table">
          <div class="overflow-x-auto ht-scrollbar">
            <table class="table w-full">
              <thead>
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <th>ID</th>
                  <th>banner title</th>
                  <th>banner slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="banners.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="banner in banners" v-else :key="banner.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ banner.id }}</td>
                  <td>
                    {{
                      $i18n.locale === 'ar' ? banner.ar_title : banner.en_title
                    }}
                  </td>
                  <td>
                    {{
                      $i18n.locale === 'ar' ? banner.ar_slug : banner.en_slug
                    }}
                  </td>
                  <td>{{ banner.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.banners.show', banner.id)"
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                    >
                      <VueFeather
                        type="eye"
                        class="
                          w-5
                          h-5
                          text-success
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <Link
                      :href="route('manage.banners.edit', banner.id)"
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                    >
                      <VueFeather
                        type="edit"
                        class="
                          w-5
                          h-5
                          text-info
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <span v-if="banner.deleted_at">trashed</span>
                    <button
                      v-else
                      class="btn btn-xs btn-ghost hover:bg-transparent group"
                      @click="openModel(banner)"
                    >
                      <VueFeather
                        type="trash-2"
                        class="
                          w-5
                          h-5
                          text-error
                          transform
                          ht-base-transition
                          group-hover:scale-110
                        "
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>select</th>
                  <th>ID</th>
                  <th>banner name</th>
                  <th>banner slug</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </ManageLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

import SearchFilter from '@/Shared/UI/SearchFilter'

const components = { Link, ManageLayout, Breadcrumb, SearchFilter }

export default {
  name: 'ManageBannersIndex',

  components,

  props: {
    banners: {
      type: Array,
      default: () => ([])
    },
  },
}
</script>
