<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Booking Create
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <create-booking 
                    data-app 
                    :channels = "channels" 
                    :ratePlans = "ratePlans" 
                    :rooms = "rooms" 
                    :errors = "errors"
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateBooking from '@/Components/Bookings/CreateBooking'

    export default {
        components: {
            AppLayout,
            CreateBooking,
        },

        props: {
            channels: Array,
            ratePlans: Array,
            rooms: Array,
            errors: Object,
        }
    }
</script>
