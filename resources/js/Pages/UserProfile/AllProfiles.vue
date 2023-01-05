<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { Link} from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="My Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Profile</h2>
        </template>
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            </div>
        </div>
    </AuthenticatedLayout>
</template>
