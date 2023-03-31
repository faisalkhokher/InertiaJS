import { createApp, h } from 'vue'
import { createInertiaApp , Link , Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Pages/shared/Layout.vue'
import { createStore } from 'vuex'
import register from './store/register'
import login from './store/login'

// VueX
const store = createStore({
  modules:{
    register : register,
    login : login
  },
  state : {
    count : 0,
  },
  mutations:{
    INCREASE_COUNT(state,payload){
      state.count += payload
    }
  },
  actions : {
    INCREASE_ACTION(mutation,payload){
      mutation.commit('INCREASE_COUNT',payload)
    }
  }
})


createInertiaApp({
  resolve: name => {
  let page = require(`./Pages/${name}`).default;
  if (page.layout === undefined) {
    page.layout = Layout;
  }
  return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
    .component('Link', Link)
    .component('Head', Head)
    .mixin({ methods: { route } })
    .use(plugin)
    .use(store)
    .mount(el)

    title : title => "My Page " + title
  },
})
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: 'green',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: false,
  })

  
