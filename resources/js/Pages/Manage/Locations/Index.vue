<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('locations')"
        active-icon="grid"
        :action-name="
          $t('action_model', { model: $t('location'), action: $t('add') })
        "
        :action-href="route('manage.locations.create')"
      />
    </template>
    <div class="htm-page htm-page__packages-index">
      <div class="htm-table-container flex flex-col space-y-8">
        <div class="htm-search-filter">
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
                  <th>{{ $t('city_name') }}</th>
                  <th>{{ $t('country_name') }}</th>
                  <th>created at</th>
                  <th class="text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="locations.length == 0">
                  no data to view yet!
                </tr>
                <tr v-for="location in locations" v-else :key="location.id">
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </td>
                  <td>{{ location.id }}</td>
                  <td>
                    {{
                      $i18n.locale === 'ar'
                        ? location.ar_name
                        : location.en_name
                    }}
                  </td>
                  <td>
                    {{
                      $i18n.locale === 'ar'
                        ? location.state.ar_name
                        : location.state.en_name
                    }}
                  </td>
                  <td>{{ location.created_at }}</td>
                  <td class="w-full flex items-center justify-center">
                    <Link
                      :href="route('manage.locations.show', location.id)"
                      class="
                        btn btn-xs btn-ghost
                        hover:bg-transparent
                        transform
                        ht-base-transition
                        hover:scale-125
                      "
                    >
                      <VueFeather
                        type="eye"
                        class="w-5 h-5 text-success"
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <Link
                      :href="route('manage.packages.edit', location.id)"
                      class="
                        inline-block
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                    >
                      <VueFeather
                        type="edit"
                        class="w-5 h-5 text-info"
                        aria-hidden="true"
                        aria-expanded="false"
                      />
                    </Link>
                    <span v-if="location.deleted_at">trashed</span>
                    <button
                      v-else
                      class="
                        ht-base-transition
                        btn btn-xs btn-ghost
                        transform
                        hover:bg-transparent hover:scale-125
                      "
                      @click="openConfirmDelete(location.id)"
                    >
                      <VueFeather
                        type="trash-2"
                        class="w-5 h-5 text-error"
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
                  <th>{{ $t('city_name') }}</th>
                  <th>{{ $t('country_name') }}</th>
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
import { reactive } from 'vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import SearchFilter from '@/Shared/UI/SearchFilter'
import { Link } from '@inertiajs/inertia-vue3'

const components = { ManageLayout, Breadcrumb, SearchFilter, Link }

export default {
  name: 'ManageLocationsIndex',

  components,

  props: {
    allLocations: {
      type: Object,
      default: () => ({}),
    },
  },

  setup(props) {
    const locations = reactive(props.allLocations.data)

    return { locations }
  },
}
</script>
