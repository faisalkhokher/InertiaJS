<template>
    <div>
        <div id="app">
            <div class="question">
                <div class="question-text">
                    {{ questions[index].text }}
                </div>
                <div class="question-choices">
                    <div class="question-choice" v-for="choice in questions[index].choices">
                        <div class="form-group">
                            <label :for="choice.val">
                                <input type="radio" :id="choice.val" :name="`q${questions[index].id}`" :value="choice.val"  /> {{ choice.text }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button @click="back()">Back</button>
            <button @click="next()">Next</button>
        </div>
    </div>
</template>


<script>
export default {
    props: {
    form: Object,
    stepForm: Object,
    },
    data() {
    return {
		questions: [{
			id: 1,
			text: 'This is question 1',
			choices: [{
				text: 'Choice 1',
				val: 'choice1'
			}, {
				text: 'Choice 2',
				val: 'choice2'
			}],
			responses: [],
		}, {
			id: 2,
			text: 'This is question 2',
			choices: [{
				text: 'Choice 1',
				val: 'choice1'
			}, {
				text: 'Choice 2',
				val: 'choice2'
			}, {
				text: 'Choice 3',
				val: 'choice3'
			}],
			responses: [],
		}],
		index: 0
	}
	},
    beforeMount () {
        let thisR = this;
         console.log(thisR.form);
         console.log("XIT");
    },
	methods: {
		next() {
            console.log("Hitting now");
            let thisR = this;
            console.log(thisR.form);
			if (this.index < this.questions.length - 1) {
				this.index++
			}
		},
		back() {
			if (this.index > 0) {
				this.index--
			}
		}
	}
}
</script>

<style lang="css" scoped>
body {
	padding: 15px;
	font-size: 12px;
}

.question-text {
	font-size: 16px;
	font-weight: bold;
	margin-bottom: 15px;
}
</style>
