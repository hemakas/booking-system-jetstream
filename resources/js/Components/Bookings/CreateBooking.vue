<template>
    <v-app>
        <form @submit.prevent="submit" >

            <!-- 4 column div -->
            <div class="grid grid-cols-4 gap-4 p-10">

                <!-- channel -->
                <div class="form-group mb-6 text-right">
                    <label for="channel" class="form-label inline-block mt-1.5 text-gray-700">Channel</label>
                </div>
                <div class="form-group mb-6">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Channel"
                    v-model="form.channel" name="channel" id="channel">
                        <option  v-for="channel in channels" :key="channel.id" :value="channel.id">{{ channel.name }}</option>
                    </select>
                    <!-- error -->
                    <p v-if="errors.channel" class="text-red-500 text-xs italic mt-3">{{ errors.channel }}</p>
                </div>

                <!-- room -->
                <div class="form-group mb-6 text-right">
                    <label for="room" class="form-label inline-block mt-1.5 text-gray-700">Room</label>
                </div>
                <div class="form-group mb-6">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Room"
                    v-model="form.room" name="room" id="room">
                        <option  v-for="room in rooms" :key="room.id" :value="room.id">{{ room.name }}</option>
                    </select>
                    <!-- error -->
                    <p v-if="errors.room" class="text-red-500 text-xs italic mt-3">{{ errors.room }}</p>
                </div>

                <!-- rate plan -->
                <div class="form-group mb-6 text-right">
                    <label for="ratePlan" class="form-label inline-block mt-1.5 text-gray-700">Rate plan</label>
                </div>
                <div class="form-group mb-6">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Rate plan"
                    v-model="form.ratePlan" name="ratePlan" id="ratePlan">
                        <option  v-for="ratePlan in ratePlans" :key="ratePlan.id" :value="ratePlan.id">{{ ratePlan.name }}</option>
                    </select>
                    <!-- error -->
                    <p v-if="errors.ratePlan" class="text-red-500 text-xs italic mt-3">{{ errors.ratePlan }}</p>
                </div>

                <!-- no of rooms -->
                <div class="form-group mb-6 text-right">
                    <label for="noOfRooms" class="form-label inline-block mt-1.5 text-gray-700">No. of Rooms</label>
                </div>
                <div class="form-group mb-6">
                    <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.noOfRooms" id="noOfRooms" aria-describedby="No of Rooms" placeholder="No. of Rooms">
                    <!-- error -->
                    <p v-if="errors.noOfRooms" class="text-red-500 text-xs italic mt-3">{{ errors.noOfRooms }}</p>
                </div>

                <!-- check in -->
                <div class="form-group mb-6 text-right">
                    <label for="checkIn" class="form-label inline-block mt-1.5 text-gray-700">Check in</label>
                </div>
                <div class="form-group mb-6">
                    <v-date-picker v-model="form.checkIn"></v-date-picker>
                    <!-- error -->
                    <p v-if="errors.checkIn" class="text-red-500 text-xs italic mt-3">{{ errors.checkIn }}</p>
                </div>

                <!-- check out -->
                <div class="form-group mb-6 text-right">
                    <label for="checkOut" class="form-label inline-block mt-1.5 text-gray-700">Check out</label>
                </div>
                <div class="form-group mb-6">
                    <v-date-picker v-model="form.checkOut"></v-date-picker>
                    <!-- error -->
                    <p v-if="errors.checkOut" class="text-red-500 text-xs italic mt-3">{{ errors.checkOut }}</p>
                </div>
                
                <!-- first name -->
                <div class="form-group mb-6 text-right">
                    <label for="firstName" class="form-label inline-block mt-1.5 text-gray-700">First Name</label>
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.firstName" id="firstName" aria-describedby="First Name" placeholder="John">
                    <!-- error -->
                    <p v-if="errors.firstName" class="text-red-500 text-xs italic mt-3">{{ errors.firstName }}</p>
                </div>

                <!-- last name -->
                <div class="form-group mb-6 text-right">
                    <label for="lastName" class="form-label inline-block mt-1.5 text-gray-700">Last Name</label>
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.lastName" id="lastName" name="lastName" aria-describedby="Last Name" placeholder="Doe">
                    <!-- error -->
                    <p v-if="errors.lastName" class="text-red-500 text-xs italic mt-3">{{ errors.lastName }}</p>
                </div>

                <!-- contact mobile -->
                <div class="form-group mb-6 text-right">
                    <label for="mobile" class="form-label inline-block mt-1.5 text-gray-700">Contact Mobile</label>
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.mobile" id="mobile" name="mobile" aria-describedby="Contact Mobile" placeholder="71XXXXXXXX">
                    <!-- error -->
                    <p v-if="errors.mobile" class="text-red-500 text-xs italic mt-3">{{ errors.mobile }}</p>
                </div>

                <!-- contact email -->
                <div class="form-group mb-6 text-right">
                    <label for="email" class="form-label inline-block mt-1.5 text-gray-700">Contact Email</label>
                </div>
                <div class="form-group mb-6">
                    <input type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.email" id="email" name="email" aria-describedby="Contact Email" placeholder="john@example.com">
                    <!-- error -->
                    <p v-if="errors.email" class="text-red-500 text-xs italic mt-3">{{ errors.email }}</p>
                </div>

                <!-- No. of Adults -->
                <div class="form-group mb-6 text-right">
                    <label for="noOfAdults" class="form-label inline-block mt-1.5 text-gray-700">No. of Adults</label>
                </div>
                <div class="form-group mb-6">
                    <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.noOfAdults" id="noOfAdults" name="noOfAdults" aria-describedby="No. of Adults">
                    <!-- error -->
                    <p v-if="errors.noOfAdults" class="text-red-500 text-xs italic mt-3">{{ errors.noOfAdults }}</p>
                </div>

                <!-- No. of Children -->
                <div class="form-group mb-6 text-right">
                    <label for="noOfChildren" class="form-label inline-block mt-1.5 text-gray-700">No. of Children</label>
                </div>
                <div class="form-group mb-6">
                    <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.noOfChildren" id="noOfChildren" name="noOfChildren" aria-describedby="No. of Children">
                    <!-- error -->
                    <p v-if="errors.noOfChildren" class="text-red-500 text-xs italic mt-3">{{ errors.noOfChildren }}</p>
                </div>

                <!-- Booking Date -->
                <div class="form-group mb-6 text-right">
                    <label for="bookingDate" class="form-label inline-block mt-1.5 text-gray-700">Booking Date</label>
                </div>
                <div class="form-group mb-6">
                    <v-date-picker v-model="form.bookingDate"></v-date-picker>
                    <!-- error -->
                    <p v-if="errors.bookingDate" class="text-red-500 text-xs italic mt-3">{{ errors.bookingDate }}</p>
                </div>

                <!-- Comment -->
                <div class="form-group mb-6 text-right">
                    <label for="comment" class="form-label inline-block mt-1.5 text-gray-700">Comment</label>
                </div>
                <div class="form-group mb-6">
                    <textarea class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    v-model="form.comment" id="comment" name="comment" rows="3" placeholder="Comment"></textarea>
                    <!-- error -->
                    <p v-if="errors.comment" class="text-red-500 text-xs italic mt-3">{{ errors.comment }}</p>
                </div>

                <!-- Amount -->
                <div class="form-group mb-6 text-right">
                    <label for="amount" class="form-label inline-block mt-1.5 text-gray-700">Amount</label>
                </div>
                <div class="form-group mb-6">
                    <input type="number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                    v-model="form.amount" id="amount" name="amount" aria-describedby="Amount">
                    <!-- error -->
                    <p v-if="errors.amount" class="text-red-500 text-xs italic mt-3">{{ errors.amount }}</p>
                </div>

                <div class="form-group mb-6 text-right"></div>
                <div class="form-group mb-6"></div>
                <div class="form-group mb-6 text-right"></div>
                
                <!-- save button -->
                <div class="form-group mb-6">
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Save</button>
                </div>

            </div>
        </form>
    </v-app>
</template>

<script>
    export default {

        data() {
            return {
                form: {
                    channel: null,
                    room: null,
                    ratePlan: null,
                    noOfRooms: null,
                    checkIn: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    checkOut: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    firstName: null,
                    lastName: null,
                    mobile: null,
                    email: null,
                    noOfAdults: null,
                    noOfChildren: null,
                    bookingDate: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    comment: null,
                    amount: null
                },
            }
        },

        props: {
            channels: Array,
            ratePlans: Array,
            rooms: Array,
            errors: Object,
        },

        methods: {

            submit() {
                this.$inertia.post(`/bookings/store`, this.form)
            },
        },

    }
</script>

<style>

</style>