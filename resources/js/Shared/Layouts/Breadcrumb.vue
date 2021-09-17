<template>
  <div
    class="
      htm-breadcrumb
      ht-base-transition
      fixed
      inset-0
      z-20
      top-16
      h-20
      bg-base-100
      flex
      items-center
      shadow
      transition
      z-0
      px-8
      max-w-full
    "
    :class="{
      'mr-72': $i18n.locale === 'ar' && isManageSidebarOpen,
      'ml-72': $i18n.locale !== 'ar' && isManageSidebarOpen,
      'mr-28': $i18n.locale === 'ar' && !isManageSidebarOpen,
      'ml-28': $i18n.locale !== 'ar' && !isManageSidebarOpen,
    }"
  >
    <ul
      class="
        htm-breadcrumb-list
        flex flex-grow
        h-full
        items-center
        text-gray-500 text-xs
        font-bold
        uppercase
        space-x-2
      "
    >
      <li>
        <Link
          :href="route('manage.dashboard')"
          class="
            flex
            space-x-2
            items-center
            group
            transform
            ht-base-transition
            hover:text-info hover:scale-105
          "
        >
          <VueFeather
            type="home"
            size="1.3rem"
            class="w-5 h-5 text-gray-400 group-hover:text-info"
          />
          <span class="mt-1">{{ $t('dashboard') }}</span>
        </Link>
      </li>
      <li class="mt-1" v-show="parentHref">
        <VueFeather
          :type="$i18n.locale === 'en' ? 'chevron-right' : 'chevron-left'"
          size="1.2rem"
        />
      </li>
      <li v-show="parentHref">
        <Link
          :href="parentHref"
          class="
            flex
            space-x-2
            items-center
            hover:text-info
            group
            transform
            ht-base-transition
            hover:text-info hover:scale-105
          "
        >
          <VueFeather
            :type="parentIcon"
            size="1.3rem"
            class="w-5 h-5 text-gray-400 group-hover:text-info"
          />
          <span class="mt-1">{{ parentName }}</span>
        </Link>
      </li>
      <li class="mt-1" v-show="activeName">
        <VueFeather
          :type="$i18n.locale === 'en' ? 'chevron-right' : 'chevron-left'"
          size="1.2rem"
        />
      </li>
      <li v-show="activeName" class="flex space-x-2 items-center text-gray-400">
        <VueFeather
          :type="activeIcon"
          size="1.3rem"
          class="w-5 h-5 text-gray-400"
        />
        <span class="mt-1">{{ activeName }}</span>
      </li>
    </ul>
    <div>
      <Link
        :href="actionHref"
        v-show="actionHref"
        class="
          btn btn-sm
          text-sm
          space-x-2
          bg-info
          border-2 border-info
          hover:bg-transparent hover:border-info hover:text-info
        "
      >
        <VueFeather :type="actionIcon" class="w-5 h-5" />
        <span>{{ actionName }}</span>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { mapState } from 'vuex'

const components = { Link }

export default {
  name: 'ManageBreadcrumb',

  components,

  props: {
    actionHref: {
      type: String,
      required: false,
      default: null,
    },
    actionName: {
      type: String,
      required: false,
      default: null,
    },
    actionIcon: {
      type: String,
      required: false,
      default: 'plus',
    },
    parentHref: {
      type: String,
      required: false,
      default: null,
    },
    parentName: {
      type: String,
      required: false,
      default: null,
    },
    parentIcon: {
      type: String,
      required: false,
      default: 'plus',
    },
    activeName: {
      type: String,
      required: false,
      default: null,
    },
    activeIcon: {
      type: String,
      required: false,
      default: 'edit-2',
    },
  },

  computed: {
    ...mapState({
      isManageSidebarOpen: (state) => state.isManageSidebarOpen,
    }),
  },
}
</script>
