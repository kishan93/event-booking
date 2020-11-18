<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto py-4">
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert" v-if="$page.flash.message">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ $page.flash.message }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert" v-if="$page.flash.message">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ $page.flash.message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <template v-for="(event,eindex) in events">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2" :key="eindex">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                        <h3 class="font-semibold text-xl text-gray-800 leading-tight">Event: {{ event.title }}</h3>
                        <hr class="">
                        <table class="table-fixed w-full">
                            <tbody>
                            <template v-for="(slot,sindex) in event.slots">
                                <tr :key="sindex">
                                    <td class="border px-4 py-2">From: {{ slot.startTime }} {{ slot.startDate }}</td>
                                    <td class="border px-4 py-2">To: {{ slot.endTime }} {{ slot.endDate }}</td>
                                    <td class="border px-4 py-2">
                                        <button @click="book(slot)"
                                                v-if="!slot.isFull"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Book
                                        </button>
                                        <template v-else>Full</template>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '../Layouts/AppLayout'

export default {
    name: 'WelcomePage',
    props: ['events','errors'],
    components: {
        AppLayout
    },
    methods: {
        book (slot) {
            if (confirm('Book selected slot?')) {
                this.$inertia.post('/bookings', {slot_id: slot.id})
            }
        }
    }
}
</script>
