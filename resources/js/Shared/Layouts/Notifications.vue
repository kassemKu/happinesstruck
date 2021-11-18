<template>
  <TransitionRoot :show="isNotificationOpen">
    <Dialog
      class="htw-notification fixed z-40 top-8 right-12 w-5/6 md:w-1/3"
      @close="closeNotification"
    >
      <TransitionChild
        as="template"
        enter="transform duration-200 ease-out"
        enter-from="opacity-0 translate-x-20 scale-x-125"
        enter-to="opacity-100 scale-x-100 translate-x-0"
        leave="transform ease-in duration-300"
        leave-from="opacity-100 translate-x-0 scale-x-100"
        leave-to="translate-x-20 scale-x-125 opacity-0"
      >
        <div
          class="
            htw-model-content
            relative
            flex flex-col
            space-y-4
            p-8
            justify-center
            bg-opacity-80
            border-2
            rounded-box
          "
          :class="
            notificationType === 'error'
              ? 'text-red-500 border-red-500 bg-red-100'
              : 'text-green-500 border-green-500 bg-base-100 '
          "
          @click="closeNotification"
        >
          <h3 class="text-lg capitalize font-semibold">
            {{ notificationTitle }}
          </h3>
          <p class="font-medium text-sm">
            {{ notificationContent }}
          </p>
        </div>
      </TransitionChild>
      <button
        class="
          absolute
          -top-2
          -right-2
          btn btn-outline btn-circle btn-sm
          border-2
          shadow-2xl
          border-green-500
          focus:ring-green-500
          focus-within:ring-green-500
          text-green-500
          hover:bg-transparent hover:border-green-500
          transform
          hover:scale-110 hover:text-green-500 hover:shadow
        "
        @click="closeNotification"
      >
        <VueFeather type="x" stroke-width="3" />
      </button>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { useStore, mapState } from "vuex";
import { TransitionRoot, TransitionChild, Dialog } from "@headlessui/vue";

const components = { TransitionRoot, TransitionChild, Dialog };

export default {
  name: "Notification",

  components,

  setup() {
    const store = useStore();

    const closeNotification = () => {
      store.commit("closeNotification");
    };

    return { closeNotification };
  },

  computed: {
    ...mapState({
      isNotificationOpen: (state) => state.notification.isOpen,
      notificationTitle: (state) => state.notification.title,
      notificationContent: (state) => state.notification.content,
      notificationType: (state) => state.notification.type,
    }),
  },
};
</script>
