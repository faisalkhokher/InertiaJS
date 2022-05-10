<template>
  <Layout>
    <p class="text-2xl">Welcome {{name}}</p>
</Layout>
</template>

<script>
import Layout from '../Pages/shared/Layout';
export default {

    props: {
        name: {
            type: String,
            default: 'World'
        }
    },
  components: {
    Layout
  },
  }
</script>
