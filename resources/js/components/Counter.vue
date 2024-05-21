<script setup>
import { ref, reactive, onMounted, defineProps } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';

// Define props to access branch_id
const props = defineProps(['branchId']);

// object to handle the static part of form
const clientDetails = reactive({
    category: '',
    date: null,
    amount: 0,
    tax: 0,
    cpn: '',
    cpm: null,
    received: '',
    agent: '',
    currency: 'Tk',
    branch_id: props.branchId, // Set branch_id from props
    image: null
});

// for image
const imageInput = ref(null);

// for single image
const handleImageChange = (event) => {
    const file = event.target.files[0]; // Take the first file if multiple files are selected
    console.log('Selected File:', file);
    clientDetails.image = file;
};

// array of object to handle the dynamic form data
const clientsFile = reactive([
    {
        name: '',
        passport: '',
        nationality: '',
        appliedCountry: ''
    }
]);

// variable to control checkbox
const showClient = ref(false);

// function to create new dynamic field after clicking +
const addClient = () => {
    clientsFile.push({ name: '', passport: '', nationality: '', appliedCountry: '' });
};

// function to remove dynamic form
const removeClient = (index) => {
    clientsFile.splice(index, 1);
}

// function to handle form data
const submitData = async () => {
    const formData = new FormData();

    formData.append('category', clientDetails.category);
    formData.append('date', clientDetails.date);
    formData.append('amount', clientDetails.amount);
    formData.append('tax', clientDetails.tax);
    formData.append('agent', clientDetails.agent);
    formData.append('cpm', clientDetails.cpm);
    formData.append('cpn', clientDetails.cpn);
    formData.append('received', clientDetails.received);
    formData.append('branch_id', clientDetails.branch_id);
    formData.append('currency', clientDetails.currency);

    if (clientDetails.image) {
        formData.append('image', clientDetails.image);
    }

    if (showClient.value) {
        clientsFile.forEach((client, index) => {
            formData.append(`clientFile[${index}][name]`, client.name);
            formData.append(`clientFile[${index}][passport]`, client.passport);
            formData.append(`clientFile[${index}][nationality]`, client.nationality);
            formData.append(`clientFile[${index}][appliedCountry]`, client.appliedCountry);
        });
    }

    try {
        const response = await axios.post(`/api/store-client-data/${clientDetails.branch_id}`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        if (response.status === 200 && response.data.msg === 'success') {
            // SweetAlert success notification
            Swal.fire({
                icon: 'success',
                title: 'Success! Data added successfuly',
                text: 'Data stored successfully.',
            });
        }

        // Optionally, you can perform additional actions or handle other cases here
    } catch (error) {
        // Handle errors if any
        console.error('Error:', error);
        // SweetAlert error notification
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Failed to store data. Please try again.',
        });
    }
};

const categories = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(`/api/get-category-data/${clientDetails.branch_id}`);
        categories.value = response.data;
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
});

</script>


<template>
    <div class=" bg-gradient-to-l from-gray-200 via-fuchsia-200 to-stone-100 p-4 rounded-lg shadow-xl">
        <form action="" class="my-2">
            <p class="bg-red-950 text-center text-white py-2.5 rounded m-3">CASH-IN
                FORM </p>
            <div class="grid grid-cols-2 gap-2 p-4">
                <div>
                    <label for="" class="font-normal">Category</label>
                    <select name="category" id="category" v-model="clientDetails.category"
                        class="w-full border border-gray-300 rounded-xl">
                        <option value="">--Choose a category--</option>
                        <option v-for="category in categories" :key="category.id" :value="category.category">
                            {{ category.category }}
                        </option>
                    </select>
                </div>
                <div>
                    <label for="">Date & Time</label>
                    <input type="date" name="date" id="" v-model="clientDetails.date"
                        class=" w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Amount</label>
                    <input type="number" name="amount" id="" placeholder="Enter Amount" v-model="clientDetails.amount"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Tax</label>
                    <input type="number" name="tax" id="" v-model="clientDetails.tax" placeholder="Total Tax Amount"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Contactable Person Name</label>
                    <input type="text" name="person_name" id="" placeholder="Person Name" v-model="clientDetails.cpn"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Contactable Person Mobile</label>
                    <input type="number" name="person_mobile" id="" placeholder="" v-model="clientDetails.cpm"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="" class="font-normal">Received Mode</label>
                    <select name="" id="" v-model="clientDetails.received"
                        class="w-full border border-gray-300 rounded-xl">
                        <option value="">--choose an option--</option>
                        <option value="cash">Cash</option>
                        <option value="bank-transfer">Bank Transfer</option>
                        <option value="check-book">Check Book</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div>
                    <label for="">Currency</label>
                    <input type="text" name="currency" value="Tk" id="" placeholder="Tk"
                        class="w-full border border-gray-300 rounded-xl">
                </div>

                <div>
                    <label for="">Agent</label>
                    <input type="text" name="agent" id="" v-model="clientDetails.agent"
                        placeholder="Enter the agent name" class="w-full border border-gray-300 rounded-xl">
                </div>
                <!-- <div>
                    <label for="" class="font-normal">Branch</label>
                    <select name="branch" id="branch" v-model="clientDetails.branch"
                        class="w-full border border-gray-300 rounded-xl">
                        <option value="">--choose an option--</option>
                        <option value="dhaka">Dhaka</option>
                        <option value="delhi">Delhi</option>
                        <option value="lucknow">Lucknow</option>
                        <option value="nepal">Nepal</option>
                    </select>
                </div> -->
                <div>
                    <label for="">Images</label>
                    <input type="file" ref="imageInput" @change="handleImageChange" name="image" id="" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg p-1 bg-white">
                </div>
            </div>
        </form>
        <div>
            <input type="checkbox" name="" id="" v-model="showClient"
                class="w-4 h-4 my-3 mx-2 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="">File </label>
        </div>

        <hr class="mb-2">

        <div v-if="showClient">
            <div v-for="(client, index) in clientsFile" :key="index">
                <div class="flex justify-between">
                    <div class="text-normal font-bold text-blue-600">Form {{ index + 1 }}</div>
                    <button class="text-red-500" @click="removeClient(index)">X</button>
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="" id="" v-model="client.name" placeholder="File Holder Name"
                                class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Passport No</label>
                            <input type="text" name="" id="" placeholder="Passport No" v-model="client.passport"
                                class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Nationality</label>
                            <input type="text" name="" id="" placeholder="Your Nationality" v-model="client.nationality"
                                class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Applied Country</label>
                            <input type="text" name="" id="" placeholder="Country you applied for"
                                v-model="client.appliedCountry" class="w-full border border-gray-300 rounded-lg">
                        </div>

                        <div>
                            <button class="text-2xl p-2" @click="addClient">+</button>

                        </div>


                    </div>

                </div>
            </div>
        </div>

        <!-- <div>
            <button @click="submitData" class="bg-purple-900 px-3 py-1 rounded text-white mt-1 hover:bg-lime-700">create</button>
        </div> -->

        <div class="mt-3">
            <button type="submit" @click="submitData"
                class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-5 text-white rounded-xl ml-2">
                Save
            </button>
        </div>


    </div>

</template>