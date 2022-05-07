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
                    Channel Name
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                
                <!-- table data -->
                <tr v-for="channel in channels" :key="channel.id" class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ channel.id }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ channel.name }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <div class="flex items-center justify-center">
                      <div class="inline-flex" role="group">
                        <a :href="`channels/${channel.id}/edit`" class="text-green-500 hover:text-green-600 transition duration-300 ease-in-out mr-4">Edit</a>
                        <a href="#!" class="text-red-600 hover:text-red-700 transition duration-300 ease-in-out">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>  
            </table>
          </div>

          <!-- pagination -->
          <!-- <pagination class="mg-1" :links="channels.links"/> -->

        </div>
      </div>
    </div>
  </v-app>
</template>

<script>

// import Pagination from '../Jetstream/pagination';

export default {

  components: {
    // Pagination
  },

  props: {
    channels: Object,
  }

  }
</script>

<style>

</style>