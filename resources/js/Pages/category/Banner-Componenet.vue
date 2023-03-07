<template>
    <div>
        <h1>Banner {{ title }}</h1>
        <div v-for="category in categories" :key="category">
            <li>{{ category }}</li>
        </div>
        <form>
            <!-- <input type="text" ref="myInput" /> -->
            <button @click="$emit('updatePost')" class="btn" id="1">
                Call
            </button>
            <br />
            <button
                @click="$emit('childComponentCall')"
                id="0011445566"
                class="btn"
            >
                EMIT
            </button>
            <br>
            <strong>Direct $emit</strong>
            <input type="text" @change="$emit('log',$event.target.value)" placeholder="XXX">

            <strong>Composition</strong>
            <input type="text" @change="CompositionEvent" placeholder="XXX">

            <strong>Client</strong>
            <input type="text" @change="clientInput" placeholder="Client . . .">
        </form>
        <br>
        <strong>Slots</strong>
        <slot name="jobcads"></slot>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        categories: Array,
    },
    setup(props,context) {
      const CompositionEvent = () => {
        context.emit('childComponentCall' , 10110101)
      } 
      return {CompositionEvent}
    },
    methods: {
        clientInput($event){
            console.log('Child Trigger');
            this.$emit('client' , $event.target.value)
        }
    },
    mounted() {},
};
</script>
