<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Calendar
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <calendar-component :bookings="bookings" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CalendarComponent from '@/Components/Calendar/CalendarComponent'

    export default {
        components: {
            AppLayout,
            CalendarComponent,
        },

        props: {
            bookings: {}
        }
    }
</script>
