<template>
       <NavLink href="/" :active="$page.component === 'home'" class=ml-2>
            Home
       </NavLink>

        <!-- <Link :href="route('users')" class="text-black hover:underline ml-2" >Users</Link> -->

        <NavLink href="/users" :active="$page.component === 'users'" class=ml-2>
            User
        </NavLink>

        <NavLink href="/setting" :active="$page.component === 'setting'" class=ml-2>
            setting
        </NavLink>

        <NavLink href="/posts" :active="$page.component === 'posts'" class=ml-2>
            Post
        </NavLink>

        <Link class=ml-2 href="/logout" method="post" as="button">Logout</Link>
</template>

<script>

import  NavLink  from "./NavLink";

export default {
  components: {
    NavLink,
  },
};
</script>
