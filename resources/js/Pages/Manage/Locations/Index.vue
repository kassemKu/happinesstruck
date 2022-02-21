<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb
        :active-name="$t('locations')"
        active-icon="map-pin"
        :action-name="
          $t('action_model', { model: $t('location'), action: $t('add') })
        "
        :action-href="route('manage.locations.create')"
      />
    </template>
    <div class="htm-page htm-page__packages-index">
      <!-- <div class="htm-table-container flex flex-col space-y-8">
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
    </div> -->

      <div class="flex flex-col space-y-8">
        <div v-for="country in locations" :key="country.id" class="htm-countries">
          <div class="flex flex-col space-y-4">
            <div class="max-w-xs flex justify-between items-center cursor-pointer group">
              <h4 class="uppercase text-2xl font-semibold">{{$i18n.locale === "ar" ? country.ar_name : country.en_name}}</h4>
              <div class="flex items-center hidden group-hover:block">
                <button class="btn btn-ghost btn-sm text-gray-400 hover:bg-transparent hover:text-info" @click.prevent="isCountryEdit=!isCountryEdit">
                  <VueFeather type="edit" />
                </button>
                <button class="btn btn-ghost btn-sm text-gray-400 hover:bg-transparent hover:text-error">
                  <VueFeather type="trash-2" />
                </button>
              </div>
            </div>
            <div v-if="isCountryEdit">
              <div class="max-w-md bg-white rounded-box p-4">
                <form @submit.prevent="updateCountry">
                  <div class="form-control">
                    <TextField
                      v-model="countryForm.en_name"
                      name="en_name"
                      :placeholder="country.en_name"
                      :label="
                        $t('field_name_lang', {
                          field: $t('country'),
                          name: $t('name'),
                          lang: $t('the_english'),
                        })
                      "
                      :server-error="$page.props.errors.en_name"
                    />
                  </div>
                  <div class="form-control">
                    <TextField
                      v-model="countryForm.ar_name"
                      name="ar_name"
                      :placeholder="country.ar_name"
                      :label="
                        $t('field_name_lang', {
                          field: $t('country'),
                          name: $t('name'),
                          lang: $t('the_arabic'),
                        })
                      "
                      :server-error="$page.props.errors.ar_name"
                    />
                  </div>
                  <div class="form-control">
                    <TextField
                      v-model="countryForm.shipping_cost"
                      name="shipping_cost"
                      :placeholder="country.shipping_cost"
                      :label=" $t('shipping_cost') "
                      :server-error="$page.props.errors.shipping_cost"
                    />
                  </div>

                  <div class="mb-8">
                    <div class="form-control">
                      <div class="flex space-x-6 items-center">
                        <label class="cursor-pointer label justify-start space-x-2">
                          <input
                            v-model="countryForm.status"
                            value="available"
                            type="radio"
                            class="radio"
                            :checked="countryForm.status === 'available'"
                          />
                          <span class="label-text text-sm font-semibold capitalize"> available </span>
                        </label>
                        <label class="cursor-pointer label justify-start space-x-2">
                          <input
                            v-model="countryForm.status"
                            value="unavailable"
                            type="radio"
                            class="radio"
                            :checked="countryForm.status === 'unavailable'"
                          />
                          <span class="label-text text-sm font-semibold capitalize"> unavailable </span>
                        </label>
                      </div>
                    </div>
                    <p
                      v-if="countryForm.errors.status"
                      class="text-xs text-red-500 font-bold"
                    >
                      {{ countryForm.errors.status }}
                    </p>
                  </div>

                  <button
                    class="btn btn-block btn-info font-bold tracking-wider text-base"
                    :class="loading && 'loading'"
                    type="submit"
                  >
                    {{ $t('update') + " " + ($i18n.locale === "ar" ? country.ar_name : country.en_name) }}
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <pre>{{locations[0].states}}</pre> -->
      </div>
    </div>

  </ManageLayout>
</template>

<script>
import { reactive, ref } from 'vue'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'
import SearchFilter from '@/Shared/UI/SearchFilter'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import TextField from '@/Shared/UI/TextField'

const components = { 
  ManageLayout, 
  Breadcrumb, 
  SearchFilter, 
  Link,
  TextField
}

export default {
  name: 'ManageLocationsIndex',

  components,

  props: {
    allLocations: {
      type: Array,
      default: () => [],
    },
  },

  setup(props) {
    const locations = reactive(props.allLocations)

    const countryForm = useForm('updateCountryForm', {
      en_name:locations.en_name,
      ar_name:locations.ar_name,
      status:locations.status,
      shipping_cost:locations.shipping_cost,
    })

    const isCountryEdit = ref(false)
    const loading = ref(false)

    const updateCountry = () => {
      console.log("111")
    }


    return { 
      locations, 
      isCountryEdit,
      updateCountry,
      countryForm,
      loading
    }
  },
}
</script>
