<template>

<!-- this section is nav bar -->
<section>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="#">
          <span class="sr-only">Workflow</span>
          <img class="h-8 w-auto sm:h-10" src="https://waada.pk/web/images/logo/footer-logo.png" alt="">
        </a>
        <span class="ml-4">
         <strong>Welcome {{username}} </strong>
        </span>
      </div>
      <!-- Active link in inertia  -->
     <Link :href="route('home')" :class="{ ' font-bold underline active': $page.component === 'home' }">Home</Link>
     <Link :href="route('users')" :class="{ ' font-bold underline active': $page.component === 'users' }">Users</Link>
     <Link :href="route('setting')" :class="{ ' font-bold underline active': $page.component === 'setting' }">Settings</Link>
     <!-- Build Custome Nav links -->
     <!-- <Nav></Nav> -->
    </div>
  </div>
</div>
</section>

<!-- this section is body content-->
<section class=p-6>
<div class=max-w-2xl>
    <slot></slot>
</div>
</section>

</template>


<script>

import Nav from "./nav.vue";
export default {
  components: {
   Nav
  },
  computed: {
    username() {
      return this.$page.props.auth.user
    }
  },
  beforeMount () {
       console.log(this.$page.url);
  }
};
</script>
