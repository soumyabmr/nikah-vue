<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Search for a Profile</h2>
        </template>

        <div class="py-0">
            <div class="">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="min-h-full">
                            <!-- Page heading -->
                            <main class="pt-0 pb-16">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="px-4 sm:px-0">
                                        <!-- Tabs -->
                                        <div class="sm:hidden">
                                            <label for="tabs" class="sr-only">Select a tab</label>
                                            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                            <select id="tabs" name="tabs" class="mt-4 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                                <option v-for="tab in tabs" :key="tab.name" :selected="tab.current">{{ tab.name }}</option>
                                            </select>
                                        </div>
                                        <div class="hidden sm:block">
                                            <div class="border-b border-gray-200">
                                                <nav class="mt-2 -mb-px flex space-x-8" aria-label="Tabs">
                                                    <a v-for="tab in tabs" :key="tab.name" :href="tab.href" :class="[tab.current ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200', 'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm']">
                                                        {{ tab.name }}
                                                        <span v-if="tab.count" :class="[tab.current ? 'bg-purple-100 text-purple-600' : 'bg-gray-100 text-gray-900', 'hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block']">{{ tab.count }}</span>
                                                    </a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stacked list -->
                                    <ul role="list" class="mt-5 border-t border-gray-200 divide-y divide-gray-200 sm:mt-0 sm:border-t-0">
                                        <li v-for="candidate in candidates" :key="candidate.ref">
                                            <a :href="route('userProfile.getProfiles')" class="group block">
                                                <div class="flex items-center py-5 px-4 sm:py-6 sm:px-0">
                                                    <div class="min-w-0 flex-1 flex items-center">

                                                        <div class="min-w-0 flex-1 px-4 md:grid   md:gap-4">
                                                            <div>
                                                                <p class="text-sm font-medium text-purple-600 truncate">{{ candidate.ref }}</p>
                                                                <p class="text-sm font-medium  truncate">Ethinicity : <span class="truncate">{{ candidate.ethinicity }}</span></p>
                                                                <p class="text-sm font-medium  truncate">Age & Height : <span class="truncate">{{ candidate.age }}</span></p>
                                                                <p class="text-sm font-medium  truncate">Residence : <span class="truncate">{{ candidate.residence }}</span></p>
                                                                <p class="mt-2   text-gray-900">
                                                                    <span class="">{{ candidate.summary }}</span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div>
                                                        <ChevronRightIcon class="h-5 w-5 text-gray-400 group-hover:text-gray-700" aria-hidden="true" />
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>


                                </div>
                            </main>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref } from 'vue'
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from '@headlessui/vue'
// import {
//     ArrowNarrowLeftIcon,
//     ArrowNarrowRightIcon,
//     BriefcaseIcon,
//     CalendarIcon,
//     CheckCircleIcon,
//     CheckIcon,
//     ChevronDownIcon,
//     ChevronRightIcon,
//     CurrencyDollarIcon,
//     LinkIcon,
//     LocationMarkerIcon,
//     MailIcon,
//     PencilIcon,
//     SearchIcon,
// } from '@heroicons/vue/solid'
// import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'
const user = {
    name: 'Whitney Francis',
    email: 'whitneyfrancis@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
}
const navigation = [
    { name: 'Dashboard', href: '#', current: true },
    { name: 'Jobs', href: '#', current: false },
    { name: 'Applicants', href: '#', current: false },
    { name: 'Company', href: '#', current: false },
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
]
const tabs = [
    { name: 'All Profiles', href: route('userProfile.getProfiles'), count: '10', current: false },
    { name: 'Shortlisted Profiles', href: '#', count: '4', current: false },
    { name: 'Request Sent', href: '#', count: '6', current: true },
    { name: 'Request Received', href: '#', count: '3', current: false },
]
const candidates = [
    {
        ref: '#1',
        ethinicity: 'Somali/American',
        residence:'Qatar' ,
        age: '30 | 168cm',
        summary:'I\'m a brother who became Muslim over 20 years ago, and have been practicing ever since. I have focused on studying Tawheed and Aqeedah and making Dawah with knowledge based on evidences. I have studied by listening to lectures, reading books and attending lectures available in my country, or online. I know Finnish, English, and Arabic. I am merciful, generous and humble, and wan\'t good for others. I smile easily, but don\'t make fun of Deen. I sometimes go to the gym and as I am retired, the financial benefits due to that suffice me. I want to make Hijrah preferably to Makkah or Madinah one day, but currently I prefer to stay in Finland due to my mother needing my help. My focus in this life is the hereafter, and aiding the Deen, and doing the best deeds.'
    },
    {
        ref: '#2',
        ethinicity: 'Pakistani/American',
        residence:'Egypt' ,
        age: '32 | 172cm',
        summary:'I am a  practising brother who has Deen, pious, enjoys studying Islamic knowledge and the Arabic language and is actively doing so'
    },
]
const publishingOptions = [
    { name: 'Published', description: 'This job posting can be viewed by anyone who has the link.', current: true },
    { name: 'Draft', description: 'This job posting will no longer be publicly accessible.', current: false },
]
// export default {
//     components: {
//         Disclosure,
//         DisclosureButton,
//         DisclosurePanel,
//         Listbox,
//         ListboxButton,
//         ListboxLabel,
//         ListboxOption,
//         ListboxOptions,
//         Menu,
//         MenuButton,
//         MenuItem,
//         MenuItems,
//         ArrowNarrowLeftIcon,
//         ArrowNarrowRightIcon,
//         BellIcon,
//         BriefcaseIcon,
//         CalendarIcon,
//         CheckCircleIcon,
//         CheckIcon,
//         ChevronDownIcon,
//         ChevronRightIcon,
//         CurrencyDollarIcon,
//         LinkIcon,
//         LocationMarkerIcon,
//         MailIcon,
//         MenuIcon,
//         PencilIcon,
//         SearchIcon,
//         XIcon,
//     },
//     setup() {
//         const selected = ref(publishingOptions[0])
//         return {
//             user,
//             navigation,
//             userNavigation,
//             tabs,
//             candidates,
//             publishingOptions,
//             selected,
//         }
//     },
// }
</script>
