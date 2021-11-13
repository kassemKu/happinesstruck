<template>
  <HtSection padding-x="12" padding-y="0">
    <div
      class="
        htw-landing__packages-slider-container
        w-full
        h-full
        relative
        overflow-hidden
        mt-36
        mb-12
      "
    >
      <div class="htw-landing__packages-slider">
        <div
          class="
            htw-landing__packages-slide
            bg-info bg-cover bg-center
            flex
            items-center
            relative
          "
        >
          <div
            class="w-full flex flex-col items px-24 text-base-100 space-y-12"
          >
            <div class="max-w-xl">
              <h1
                class="text-3xl capitalize font-black leading-10 tracking-wider"
              >
                happiness truck package
              </h1>
              <p class="mt-8 leading-7 text-opacity-50 text-base font-medium">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Voluptas neque reiciendis eligendi ad praesentium dolor ducimus
                nesciunt tempore? Iure esse autem ab dolor ex mollitia excepturi
                nihil enim provident repellat.
              </p>
            </div>
            <div>
              <div
                class="
                  flex
                  h-20
                  max-w-3xl
                  bg-base-100 bg-opacity-85
                  rounded-sm rounded-tl-3xl rounded-br-3xl
                  flex
                  items-center
                  text-neutral text-opacity-85
                  overflow-hidden
                "
              >
                <div class="flex-grow h-full">
                  <button
                    class="
                      h-full
                      w-full w-full
                      flex
                      items-center
                      justify-center
                      text-sm
                      capitalize
                      font-medium
                    "
                  >
                    <span class="flex flex-col space-y-2">
                      <span class="text-gray-400">person</span>
                      <span class="flex items-center justify-center space-x-2">
                        <span>1 adult</span>
                        <VueFeather
                          type="chevron-down"
                          stroke-width="3"
                          class="h-4 w-4"
                        />
                      </span>
                    </span>
                  </button>
                </div>
                <div class="flex-grow h-full">
                  <!-- <Listbox v-model="selectedPerson">
                    <ListboxButton>{{ selectedPerson.name }}</ListboxButton>
                    <ListboxOptions>
                      <ListboxOption
                        v-for="person in people"
                        :key="person"
                        :value="person"
                        :disabled="person.unavailable"
                      >
                        {{ person.name }}
                      </ListboxOption>
                    </ListboxOptions>
                  </Listbox> -->
                  <button
                    class="
                      h-full
                      w-full w-full
                      flex
                      items-center
                      justify-center
                      text-sm
                      capitalize
                      font-medium
                    "
                    @click="openCalender"
                  >
                    <span class="flex flex-col space-y-2">
                      <span class="text-gray-400">start at</span>
                      <span class="flex items-center justify-center space-x-2">
                        <span>jan,21, 22, 7.30PM</span>
                        <VueFeather
                          type="chevron-down"
                          stroke-width="3"
                          class="h-4 w-4"
                        />
                      </span>
                    </span>
                  </button>
                </div>
                <div class="flex-grow h-full">
                  <button
                    class="
                      h-full
                      w-full w-full
                      flex
                      items-center
                      justify-center
                      text-sm
                      capitalize
                      font-medium
                    "
                  >
                    <span class="flex flex-col space-y-2">
                      <span class="text-gray-400">end at</span>
                      <span class="flex items-center justify-center space-x-2">
                        <span>jan,21, 22, 7.30PM</span>
                        <VueFeather
                          type="chevron-down"
                          stroke-width="3"
                          class="h-4 w-4"
                        />
                      </span>
                    </span>
                  </button>
                </div>
                <div class="flex-grow h-full">
                  <button
                    class="
                      h-full
                      w-full
                      bg-warning
                      text-base-100
                      font-semibold
                      uppercase
                      flex
                      items-center
                      justify-center
                    "
                  >
                    booking now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- slider -->
      </div>
      <div
        class="
          flex
          items-center
          justify-end
          space-x-4
          h-48
          px-12
          absolute
          -bottom-8
          right-8
        "
      >
        <button
          class="
            btn btn-circle
            bg-transparent
            border-base-100
            text-base-100
            border-2
            transform
            hover:bg-transparent
            hover:border-base-100
            hover:text-base-100
            hover:scale-110
          "
        >
          <VueFeather type="chevron-left" stroke-width="3" />
        </button>
        <button
          class="
            btn btn-circle
            bg-transparent
            border-base-100
            text-base-100
            border-2
            transform
            hover:bg-transparent
            hover:border-base-100
            hover:text-base-100
            hover:scale-110
          "
        >
          <VueFeather type="chevron-right" stroke-width="3" />
        </button>
      </div>
      <!-- arrow nav -->
    </div>
  </HtSection>
</template>

<script>
import { reactive } from 'vue'
import HtSection from '@/Shared/Layouts/HtSection'
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'

const components = {
  HtSection,
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
}

export default {
  name: 'PackagesSlider',

  components,

  steup() {
    const people = [
      { id: 1, name: 'Durward Reynolds', unavailable: false },
      { id: 2, name: 'Kenton Towne', unavailable: false },
      { id: 3, name: 'Therese Wunsch', unavailable: false },
      { id: 4, name: 'Benedict Kessler', unavailable: true },
      { id: 5, name: 'Katelyn Rohan', unavailable: false },
    ]
    const selectedPerson = ref(people[0])
    const openCalender = () => {}

    return { openCalender, selectedPerson, people }
  },

  data() {
    return {
      form: this.$inertia.form({
        startDate: '',
      }),
      packages: [
        {
          subTitle: 'red title',
          title: 'our pakage name',
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi tempora hic ullam aliquam enim quas, cum aliquid officiis quasi sit quaerat nulla, quidem, voluptatibus explicabo accusantium praesentium quo? Cumque, animi?',
          images: [
            '/images/659b72077a54ad832458b88d7873792c.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',
          ],
          img: '/images/products/product_23.jpg',
          items: [
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
          ],
        },
        {
          subTitle: 'red title',
          title: 'our pakage name',
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi tempora hic ullam aliquam enim quas, cum aliquid officiis quasi sit quaerat nulla, quidem, voluptatibus explicabo accusantium praesentium quo? Cumque, animi?',
          images: [
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',
          ],
          img: '/images/659b72077a54ad832458b88d7873792c.jpg',
          items: [
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
          ],
        },
        {
          subTitle: 'red title',
          title: 'our pakage name',
          shortDescription:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi tempora hic ullam aliquam enim quas, cum aliquid officiis quasi sit quaerat nulla, quidem, voluptatibus explicabo accusantium praesentium quo? Cumque, animi?',
          images: [
            '/images/659b72077a54ad832458b88d7873792c.jpg',
            '/images/AZhu69ap-image-1-6.jpg',
            '/images/products/product_23.jpg',

            '/images/products/product_23.jpg',
          ],
          img: '/images/AZhu69ap-image-1-6.jpg',
          items: [
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
            {
              name: 'Lorem ipsum dolor sit elit.',
            },
          ],
        },
      ],
    }
  },
}
</script>

<style scoped>
.htw-landing__packages-slide {
  height: calc(100vh - 20rem);
  border-top-left-radius: 7rem;
  border-bottom-right-radius: 8rem;
}
</style>
