<template>
  <div class="htm-header__user-area-actions">
    <Menu as="div">
      <div>
        <MenuButton
          class="
            mth-header__user-action
            bg-base-100
            btn
            h-16
            space-x-2
            btn-ghost
            rounded-none
            text-info
            hover:bg-base-100 hover:text-warning
          "
        >
          <span class="font-bold">{{ $t('full_name') }}</span>
          <img
            src="/images/me.png"
            class="h-10 w-10 mask mask-squircle border"
          />
          <ChevronDown16 class="w-5 h-5" />
        </MenuButton>
      </div>
      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="
            absolute
            w-56
            mt-2
            bg-white
            overflow-hidden
            divide-y divide-gray-200
            rounded-box
            shadow-2xl
            ring-1 ring-black ring-opacity-5
            focus:outline-none
          "
          :class="
            $i18n.locale === 'ar'
              ? 'left-0 origin-top-left'
              : 'right-0 origin-top-right'
          "
        >
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-info text-white' : 'text-gray-900',
                  'group flex items-center w-full px-2 py-2 text-sm',
                ]"
              >
                <VueFeather
                  type="home"
                  :active="active"
                  class="w-5 h-5 mr-2 text-info"
                  aria-hidden="true"
                />
                {{ $page.props.locale.app.dashboard }}
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-info text-white' : 'text-gray-900',
                  'group flex items-center w-full px-2 py-2 text-sm',
                ]"
              >
                <!-- <DuplicateIcon
                  :active="active"
                  class="w-5 h-5 mr-2 text-info"
                  aria-hidden="true"
                /> -->
                Duplicate
              </button>
            </MenuItem>
          </div>
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-info text-white' : 'text-gray-900',
                  'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                ]"
              >
                <!-- <ArchiveIcon
                  :active="active"
                  class="w-5 h-5 mr-2 text-info"
                  aria-hidden="true"
                /> -->
                Archive
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-info text-white' : 'text-gray-900',
                  'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                ]"
              >
                <!-- <MoveIcon
                  :active="active"
                  class="w-5 h-5 mr-2 text-info"
                  aria-hidden="true"
                /> -->
                Move
              </button>
            </MenuItem>
          </div>

          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-info text-white' : 'text-gray-900',
                  'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                ]"
              >
                <!-- <DeleteIcon
                  :active="active"
                  class="w-5 h-5 mr-2 text-info"
                  aria-hidden="true"
                /> -->
                Delete
              </button>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>

<script>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'

const components = { Menu, MenuButton, MenuItems, MenuItem }

export default {
  name: 'UserAreaDropdown',

  components,
}
</script>
