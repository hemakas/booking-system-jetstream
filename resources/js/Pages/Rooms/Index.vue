<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Rooms Index
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <!-- create Room button -->
                <div class="flex justify-end mb-6">
                    <a :href="route('rooms.create')" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Add New</a> 
                </div>
                
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <view-rooms :rooms="rooms" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ViewRooms from '@/Components/Rooms/ViewRooms'

    export default {
        components: {
            AppLayout,
            ViewRooms,
        },

        props: {
            rooms: Array,
        }
    }
</script>
