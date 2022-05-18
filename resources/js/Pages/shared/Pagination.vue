<template>
   <div class="mt-6">
    <Link
     v-for="link in custome_link"
       :href="link.url"
       v-html="link.label"
      class="text-gray-500 px-1"
    />
    </div>
</template>

<script>
export default {
    props: {
        custome_link : Array
    }
}
</script>
