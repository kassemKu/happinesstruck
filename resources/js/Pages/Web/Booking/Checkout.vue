<template>
  <WebLayout>
    <Head title="BOOKING">
      <meta title="description" content="lorem ipsum" />
    </Head>
    <div
      class="
        htw-page htw-checkout-page
        bg-base-300 bg-opacity-20
        my-6
        mx-8
        sm:mx-16
        rounded-box
      "
    >
      <HtSection :padding-x="16">
        <div class="flex flex-col space-y-8 -mx-4 md:-mx-0">
          <div class="w-full flex items-center justify-center mb-8">
            <div class="text-center">
              <h3 class="text-xl font-bold capitalize">
                complete your booking request
              </h3>
              <p class="font=semibold">final step to create awesome event</p>
            </div>
          </div>
          <!-- page title -->
          <ul class="w-full flex">
            <li
              v-for="(group, step) in bookingSteps"
              :key="step"
              class="htw-step flex-1"
              :class="[
                currentStep === step && 'htw-step-inprogress',
                group.completed && 'htw-step-completed',
              ]"
            >
              <div>
                <div
                  class="
                    flex flex-col
                    items-center
                    space-y-4
                    text-slate-500
                    relative
                  "
                  :class="[
                    currentStep === step && 'text-blue-500',
                    group.completed && 'text-slate-100',
                  ]"
                >
                  <div
                    class="
                      htw-step-icon
                      overflow-hidden
                      w-16
                      h-16
                      rounded-full
                      flex flex-col
                      items-center
                      justify-center
                    "
                    :class="[
                      currentStep === step ? 'bg-blue-200' : 'bg-slate-200',
                      group.completed && 'bg-green-600',
                    ]"
                  >
                    <VueFeather :type="group.icon" />
                  </div>
                  <p
                    class="capitalize font-medium"
                    :class="[
                      group.completed && 'text-green-600',
                      (group.completed || step === currentStep) && 'font-bold',
                    ]"
                  >
                    {{
                      $i18n.locale === 'ar' ? group.ar_label : group.en_label
                    }}
                  </p>
                </div>
                <!-- step 1 -->
              </div>
              <!-- steps -->
            </li>
          </ul>
          <form @submit.prevent="booking">form</form>
          <footer class="flex justify-end items-center">
            {{ currentStep }}
            <div class="btn-group">
              <button class="btn btn-sm" @click="previousStep">
                {{ $t('prev') }}
              </button>
              <button class="btn btn-sm" @click="nextStep">
                {{ $t('next') }}
              </button>
            </div>
          </footer>
        </div>
      </HtSection>
    </div>
  </WebLayout>
</template>

<script>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'
import WebLayout from '@/Layouts/Web/WebLayout'
import HtSection from '@/Shared/Layouts/HtSection'
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'

const components = {
  Head,
  WebLayout,
  HtSection,
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
}
export default {
  name: 'BookingCheckoutPage',
  components,
  setup() {
    const form = useForm('bookingCollection', {
      event_title: null,
      event_kids_count: null,
      event_description: null,
      event_city: null,
      event_aria: null,
      event_address: null,
      event_house_number: null,
      event_date: {
        start_date: null,
        expiry_date: null,
      },
      event_time: null,
      collection: [],
      subtotal: null,
      total: null,
      full_name: null,
      mobile: null,
      email: null,
      arias: [],
      hasCoupon: false,
      couponValue: null,
    })
    const bookingSteps = [
      {
        en_label: 'date and time',
        ar_label: 'التاريخ والوقت',
        icon: 'calendar',
        completed: true,
      },
      {
        en_label: 'event details',
        ar_label: 'معلومات المناسبة',
        icon: 'calendar',
        completed: false,
      },
      {
        en_label: 'billing details',
        ar_label: 'بيانات الفاتورة',
        icon: 'calendar',
        completed: false,
      },
    ]
    const currentStep = ref(0)
    // event times
    const times = [
      'from 9 PM TO 12 AM',
      'from 12 AM TO 3 AM',
      'from 3 AM TO 6 AM',
      'from 6 AM TO 9 AM',
      'from 9 AM TO 12 AM',
    ]

    form.event_time = ref(times[0])

    const previousStep = () => {
      console.log(1111)
      //   if (isFirstStep) return
      currentStep.value--
    }
    const nextStep = () => {
      console.log(1111)
      //   if (isLastStep) return
      currentStep.value++
    }
    const totalSteps = () => {
      steps.length
    }
    const isFirstStep = () => {
      currentStep.value === 0
    }
    const isLastStep = () => {
      currentStep.value === totalSteps - 1
    }

    const booking = () => {
      console.log(form)
    }

    return {
      bookingSteps,
      form,
      times,
      currentStep,
      booking,
      previousStep,
      nextStep,
    }
  },
}
</script>

<style>
.htw-step:not(:last-child) .htw-step-icon::after {
  content: '';
  display: block;
  position: absolute;
  height: 2rem;
  width: 100%;
  left: calc(50% + 1rem);
  background-color: rgb(226 232 240);
}
.htw-step.htw-step-inprogress:not(:last-child) .htw-step-icon::after {
  background-color: rgb(191 219 254);
}
.htw-step.htw-step-completed:not(:last-child) .htw-step-icon::after {
  background-color: rgb(22 163 74);
}
</style>
