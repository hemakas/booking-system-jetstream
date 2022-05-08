<template>
    <div class="grid grid-cols-2 gap-4 p-6">
        <div>
            <form @submit.prevent="submit" >
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6 text-right">
                        <label for="ratePlanName" class="form-label inline-block mt-1.5 text-gray-700">RatePlan Name</label>
                    </div>
                    <div class="form-group mb-6">
                        <input type="text" v-model="form.ratePlanName" id="ratePlanName" name="ratePlanName" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6"></div>
                    <div class="form-group mb-6">
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        
        props: {
            ratePlan: Array,
        },

        data() {
            return {
                form: {
                    ratePlanName: this.ratePlan.name,
                },
            }
        },

        methods: {
            submit() {
                this.$inertia.put(`/ratePlans/${this.ratePlan.id}`, this.form)
            },
        },

    }
</script>

<style>

</style>