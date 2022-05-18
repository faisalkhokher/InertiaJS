
<template>
<Head>
<title>Home</title>
</Head>
    <p class="text-2xl">Welcome {{name}}</p>
    <h1>Time {{time}}</h1>
</template>

<script>
import Layout from '../Pages/shared/Layout';

export default {
    //! this is persistence layout for all pages in this all component is under layout.
   layout: Layout
}
</script>
