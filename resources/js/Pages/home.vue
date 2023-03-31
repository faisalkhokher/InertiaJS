
<template>
<Head>
<title>Home</title>
</Head>
    <p class="text-2xl">Welcome {{name}}</p>
    <h1>Email 
        <b>{{user.state.email}}</b>
    </h1>
    <h1>Pass 
        <b>{{user.state.password}}</b>
    </h1>
    <h1>Name :  
        <b>{{user.state.name}}</b>
    </h1>
</template>

<script>
import Layout from '../Pages/shared/Layout';

export default {
    //! this is persistence layout for all pages in this all component is under layout.
   layout: Layout,
   computed: {
    user() {
        return this.$store.getters.getUser;
    },
   },
   mounted() {
    return this.$store.dispatch('getUserAPI');
   }
}
</script>
