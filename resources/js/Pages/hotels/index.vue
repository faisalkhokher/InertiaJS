<template>
    <div>
        <HotelLists :name="nameFile">
        </HotelLists>
    </div>
</template>
<script>
import HotelLists from './HotelLists.vue'
export default {
    name: "IndexVue",
    components : {
        HotelLists,
    },
    data () {
        return {
            nameFile : "Faisal"
        }
    }
}
</script>