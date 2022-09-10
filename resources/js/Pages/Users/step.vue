
    <template>
        <div>
            <step1
            v-if="stepForm.step1.active"
            :stepForm="stepForm"
            :form="Form"
            @nextForm="nextForm"
            ref="stepOne"
            />
        </div>
    </template>


  <script>
  import { useForm } from "@inertiajs/inertia-vue3";
  import step1 from "./step1";

  export default {
    name: "StepForm",
    props: {
    },
    components: {
      step1,
    },
    mounted() {
      // for development change step manually
      // this.nextForm("step4");
      //
      console.log(this.Form);
    },
    data() {
    return {
        stepForm: {
        step1: { name: "Car Details", active: true, stepDone: false },
      }
	}
	},
    setup() {
      const Form = useForm({
        step: "1",
        name: "1",
      });
      console.log("FF");
      console.log(Form);
      return { Form };
    },
  };

  </script>

