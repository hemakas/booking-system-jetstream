<template>
  <v-app>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            
            <table class="min-w-full text-center">
              <thead class="border-b bg-gray-50">
                <tr>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    #
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Client Name
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Client's Phone
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Client's Email
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Check In
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Check Out
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Channel
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Room
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Rate Plan
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    No. of Rooms
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    No. of Adults
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    No. of Children
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Booking Date
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Total Amount
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Comment
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Action
                  </th>
                </tr>
              </thead>
              
              <tbody>
                <!-- table data -->
                <tr v-for="booking in bookings" :key="booking.id" class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.id }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.first_name }} {{ booking.last_name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ bookings.contact_mobile }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.contact_email }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.check_in }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.check_out }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.channel.name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.room.name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.rate_plan.name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.no_of_rooms }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.no_of_adults }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.no_of_children }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.booking_date }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.total_amount }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ booking.comment }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <div class="flex items-center justify-center">
                      <div class="inline-flex" role="group">
                        <a :href="`bookings/${booking.id}/edit`" class="text-green-500 hover:text-green-600 transition duration-300 ease-in-out mr-4">Edit</a>
                        
                        <form @submit.prevent="deleteBooking(booking.id)">
                          <button type="submit" class="text-red-600 hover:text-red-700 transition duration-300 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                        </form>
                      </div>
                    </div>
                  </td>

                  <!-- delete confirmation modal -->
                  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog relative w-auto pointer-events-none">
                      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                          <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Delete confirmation</h5>
                          <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body relative p-4">Are you sure you want to delete this recored?</div>
                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">

                          <!-- confirm delete button  -->
                          <form @submit.prevent="submit">
                            <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out mr-3">Ok</button>
                          </form>

                          <!-- modal close button -->
                          <button type="button" class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">Cancle</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
              </tbody>

            </table>
          </div>

          <!-- pagination -->
          <!-- <pagination class="mg-1" :links="bookings.links"/> -->

        </div>
      </div>
    </div>
  </v-app>
</template>

<script>

  // import Pagination from '../Jetstream/pagination';

  export default {

    data() {
      return {
        deleteId: null
      }
    },
    
    components: {
        // Pagination
      },

    props: {
      bookings: {},
    },
    
    methods: {
      deleteBooking(id) {
        this.deleteId = id
      },
      
      submit() {
        this.$inertia.delete(`/bookings/${this.deleteId}`)
        location.reload()
      },
    },

  }

</script>

<style>

</style>