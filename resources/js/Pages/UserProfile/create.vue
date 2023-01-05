<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    userProfile: Object,
    status: String,
});
const user = usePage().props.value.userProfile;
const form = useForm({
    user_id: user.user_id,
    first_name: user.first_name,
    last_name: user.last_name,
    ethnicity: user.ethnicity,
    residence: user.residence,
    gender: user.gender,
    body_type: user.body_type,
    complexion: user.complexion,
    date_of_birth: user.date_of_birth,
    phone: user.phone,
    marital_status: user.marital_status,
    height: user.height,
    weight: user.weight,
    education: user.education,
    profession: user.profession,
    summary: user.summary,
    expectation: user.expectation,
    country: user.country,
    nationality: user.nationality,
});
</script>

<template>
    <Head title="My Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Profile</h2>
        </template>
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class=" max-w-7xl p-0 sm:p-8 bg-white sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('userProfile.update'))" class="mt-6 space-y-6">
                        <input type="hidden" id="user_id" v-model="form.user_id">
                        <div>
                            <InputLabel for="first_name" value="First Name" />
                            <TextInput
                                id="first_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.first_name"
                                required
                                autofocus
                                autocomplete="first_name"
                            />
                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>
                        <div>
                            <InputLabel for="first_name" value="Last Name" />
                            <TextInput
                                id="last_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.last_name"
                                required
                                autofocus
                                autocomplete="last_name"
                            />
                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                        <div>
                            <InputLabel for="ethnicity" value="Ethnicity"/>
                            <TextInput
                                id="ethnicity"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.ethnicity"
                                required
                                autofocus
                                autocomplete="ethnicity"
                            />
                            <InputError class="mt-2" :message="form.errors.ethnicity" />
                        </div>
                        <div>
                            <InputLabel for="nationality" value="Nationality"/>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.nationality'>
                                <option value='' >Select Nationality</option>
                                <option value='Indian' >Indian</option>
                                <option value='American' >American</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.nationality" />
                        </div>
                        <div>
                            <InputLabel for="country" value="Country of Residence"/>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.country'>
                                <option value='' >Select Country</option>
                                <option value='1' >Qatar</option>
                                <option value='2' >Egypt</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.country" />
                        </div>
                        <div>
                            <InputLabel for="gender" value="Gender" />
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.gender'>
                                <option value='' >Select Gender</option>
                                <option value='Male' >Male</option>
                                <option value='Female' >Female</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.gender" />
                        </div>
                        <div>
                            <InputLabel for="body_type" value="Body Type" />
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.body_type'>
                                <option value='' >Select Body Type</option>
                                <option value='Slim' >Slim</option>
                                <option value='Athletic' >Athletic</option>
                                <option value='Average' >Average</option>
                                <option value='Heavy' >Heavy</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.body_type" />
                        </div>
                        <div>
                            <InputLabel for="complexion" value="Complexion" />
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.complexion'>
                                <option value='' >Select Complexion</option>
                                <option value='Very Fair' >Very Fair</option>
                                <option value='Fair' >Fair</option>
                                <option value='Wheatish' >Wheatish</option>
                                <option value='Wheatish Brown' >Wheatish Brown</option>
                                <option value='Dark' >Dark</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.complexion" />
                        </div>
                        <div>
                            <InputLabel for="date_of_birth" value="Date of Birth" />
                            <TextInput
                                id="date_of_birth"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date_of_birth"
                                required
                                autofocus
                                autocomplete="date_of_birth"
                            />
                            <InputError class="mt-2" :message="form.errors.date_of_birth" />
                        </div>
                        <div>
                            <InputLabel for="phone" value="Phone" />
                            <TextInput
                                id="phone"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.phone"
                                required
                                autofocus
                                autocomplete="phone"
                            />
                            <InputError class="mt-2" :message="form.errors.phone" />
                        </div>

                        <div>
                            <InputLabel for="marital_status" value="Marital Status" />
                            <select required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" v-model='form.marital_status'>
                                <option value='' >Select Complexion</option>
                                <option value='Never Married' >Never Married</option>
                                <option value='Married' >Married</option>
                                <option value='Divorced' >Divorced</option>
                                <option value='Widowed' >Widowed</option>
                                <option value='Awaiting Divorce' >Awaiting Divorce</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.marital_status" />
                        </div>
                        <div>
                            <InputLabel for="height" value="Height" />
                            <TextInput
                                id="height"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.height"
                                required
                                autofocus
                                autocomplete="height"
                            />
                            <InputError class="mt-2" :message="form.errors.height" />
                        </div>
                        <div>
                            <InputLabel for="weight" value="Weight" />
                            <TextInput
                                id="weight"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.weight"
                                autofocus
                                autocomplete="weight"
                            />
                            <InputError class="mt-2" :message="form.errors.weight" />
                        </div>
                        <div>
                            <InputLabel for="education" value="Education" />
                            <TextInput
                                id="education"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.education"
                                autofocus
                                autocomplete="education"
                            />
                            <InputError class="mt-2" :message="form.errors.education" />
                        </div>
                        <div>
                            <InputLabel for="profession" value="Profession" />
                            <TextInput
                                id="profession"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.profession"
                                autofocus
                                autocomplete="profession"
                            />
                            <InputError class="mt-2" :message="form.errors.profession" />
                        </div>
                        <div>
                            <InputLabel for="summary" value="A Brief Background About Yourself?" />
                            <textarea required
                                id="summary" rows="10"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.summary"
                            />
                            <InputError class="mt-2" :message="form.errors.summary" />
                        </div>
                        <div>
                            <InputLabel for="expectation" value="What Are You Looking For In A Potential Spouse?" />
                            <textarea required rows="10"
                                id="expectation"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.expectation"
                            />
                            <InputError class="mt-2" :message="form.errors.expectation" />
                        </div>
                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
