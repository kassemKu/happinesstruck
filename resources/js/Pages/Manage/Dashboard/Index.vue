<template>
  <ManageLayout>
    <template #breadcrumb>
      <Breadcrumb />
    </template>
    <div>
      <button class="btn" @click="openNotification">open notification</button>
      <pre>{{ $page.props }}</pre>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum eius
        ea earum voluptatibus quo soluta nesciunt voluptatum molestias labore.
        Deserunt sunt corrupti, quasi unde esse mollitia ad illo, neque, autem
        nisi soluta enim quisquam non reprehenderit eius nostrum magni
        blanditiis sint distinctio maiores? Corporis non quidem ipsam aperiam,
        ab neque minima. Numquam voluptates provident quisquam voluptate iusto
        pariatur? Eligendi quibusdam ipsa eos excepturi atque aliquam aperiam
        optio eveniet perspiciatis debitis illo facere voluptate nesciunt
        doloremque perferendis iste corrupti nihil voluptates voluptatem minima
        modi doloribus itaque, minus architecto. Praesentium molestias suscipit
        voluptates fuga quaerat? Consequatur quibusdam at architecto facilis
        sequi totam neque eum iusto cupiditate dignissimos ea, error, tenetur
        accusamus quas eligendi nemo perspiciatis numquam voluptas. Sunt,
        temporibus. Commodi tempora quas in provident tempore neque inventore
        soluta debitis quo ab, nam ratione dolores vel dicta quisquam autem
        molestias mollitia aliquid? Suscipit, quibusdam sint itaque obcaecati,
        soluta aperiam cum deserunt vero quidem eveniet tenetur error pariatur?
        Sunt eligendi ex inventore! Inventore deleniti ut id nulla iure culpa
        maiores cumque, repellendus mollitia asperiores illo quisquam eius hic
        incidunt repudiandae aut quis dolorem delectus magni adipisci eveniet
        atque! Nobis ducimus iure excepturi, labore fugit distinctio laudantium
        nesciunt natus at tempora voluptas eum? Reiciendis nemo sapiente rerum
        praesentium quasi rem, aspernatur id blanditiis beatae facere nulla
        explicabo sed nobis voluptas obcaecati, eligendi ab inventore
        perspiciatis adipisci cupiditate debitis ipsa veritatis? Ducimus, quis
        minus! Quam illum, eligendi maiores, molestiae perferendis officia
        consequatur earum at, culpa sed vel qui? Vel pariatur aliquam adipisci
        illum odit consequuntur alias officia dolore ipsam deleniti neque nihil,
        quam porro dolores voluptates rerum blanditiis minima unde assumenda
        maxime excepturi praesentium! Placeat, omnis? Totam sapiente at amet,
        corporis quae magnam voluptate tempora sed nisi sunt maxime tenetur
        deleniti sit atque doloribus quam quibusdam, modi esse. Odio laudantium
        ea quam, deleniti architecto odit molestiae eligendi voluptates
        voluptate, sequi praesentium accusantium accusamus harum autem,
        molestias aliquam explicabo dolore. Corporis animi numquam recusandae
        voluptate fugiat ad, similique non quod iure, ex sapiente, reiciendis
        libero amet aspernatur! Ullam, fugiat modi deleniti repudiandae at
        recusandae minima nobis expedita officia cum? Minima, est. Delectus
        laborum, ducimus eaque animi voluptate doloribus beatae perferendis quos
        vitae ullam repudiandae mollitia nesciunt aspernatur dolorem placeat,
        explicabo incidunt officiis magnam! Earum delectus ea facere est
        repellat et expedita molestiae officia, nesciunt in. Eligendi sint
        voluptatibus magni dolor repellendus incidunt voluptatem atque!
        Architecto odit, at totam voluptas magnam ut modi ullam expedita
        accusamus incidunt error, reprehenderit quaerat iure alias omnis
        mollitia qui obcaecati repellat? Dolor aspernatur maxime officia
        possimus corporis assumenda aperiam ea consectetur veritatis sequi sit
        porro facilis molestiae harum praesentium magnam magni quibusdam, ad
        voluptatum nisi adipisci quisquam. Cupiditate sed rerum nihil alias sit
        pariatur eaque, eius praesentium similique tempore et porro ullam
        laboriosam ex! Rem ducimus debitis eum, nulla quibusdam praesentium
        porro molestiae, laborum placeat consectetur nisi eaque voluptas
        deleniti voluptatum numquam! Eum numquam cum nostrum debitis doloribus
        pariatur illo consequuntur itaque quos, necessitatibus eius ullam quia
        deleniti vitae ducimus sed eligendi voluptatibus repellendus a autem
        praesentium. Dolorem sed alias amet tempore!
      </p>
    </div>
  </ManageLayout>
</template>

<script>
import { useStore } from 'vuex'
import ManageLayout from '@/Layouts/Manage/ManageLayout'
import Breadcrumb from '@/Shared/Layouts/Breadcrumb'

const components = { ManageLayout, Breadcrumb }

export default {
  name: 'ManageDashboard',

  components,

  setup() {
    const store = useStore()

    const openNotification = () => {
      store.commit('openNotification', {
        title: 'lorem ipsum',
        type: 'success',
        content: 'lorem ipsum',
      })
    }

    return { openNotification }
  },
}
</script>
