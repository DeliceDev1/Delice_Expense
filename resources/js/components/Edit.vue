        <script setup>
        import { ref, reactive, onMounted, defineProps } from 'vue';
        import Swal from 'sweetalert2';


        const props = defineProps(['branchId']);

        // object to handle the static part of form
        const clientDetails = reactive({
            id: null,
            category: '',
            date: null,
            amount: 0,
            tax: 0,
            cpn: '',
            cpm: null,
            received: '',
            agent: '',
            currency: 'Tk',
            branch_id: props.branchId,
            image: null
        });

        //for image 
        const imageInput = ref(null);

        //for single image
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

        const all_clients = ref([]);


        // function to remove dynamic form
        const removeClient = (index) => {
            clientsFile.splice(index, 1);
        }

        const loadData = async () => {
            const data = await axios.get(`/api/get-client-data/${clientDetails.branch_id}`);
            all_clients.value = data.data;
        }

        onMounted(() => {
            loadData();
        });


        let count = all_clients.length;


        const isFormVisible = ref(false);

        // function to edit 
        const editClient = (data) => {
            isFormVisible.value = true;

            clientDetails.id = data.id;
            clientDetails.category = data.category;
            clientDetails.date = data.date;
            clientDetails.amount = data.amount;
            clientDetails.tax = data.tax;
            clientDetails.cpn = data.cpn;
            clientDetails.cpm = data.cpm;
            clientDetails.received = data.received;
            clientDetails.branch_id = data.branch_id;
            clientDetails.agent = data.agent;
            // clientDetails.branch = data.branch;

            clientDetails.image = null;

            if (data.client_files.length) {
                showClient.value = true;
                const mappedArray = data.client_files.map(el => {
                    return {
                        name: el.name,
                        passport: el.passport,
                        nationality: el.nationality,
                        appliedCountry: el.appliedCountry,
                    }
                });
                clientsFile.splice(0, clientsFile.length, ...mappedArray);
            }

        }



        const updateData = async () => {
            const formData = new FormData();
            formData.append('id', clientDetails.id);
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

            clientsFile.forEach((client, index) => {
                formData.append(`clientFile[${index}][name]`, client.name);
                formData.append(`clientFile[${index}][passport]`, client.passport);
                formData.append(`clientFile[${index}][nationality]`, client.nationality);
                formData.append(`clientFile[${index}][appliedCountry]`, client.appliedCountry);
            });

            try {
                const response = await axios.post(`/api/update-client-data/${clientDetails.branch_id}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });

                // Log the response for debugging
                console.log(response);

                // Check if the response has a 'msg' property and its value is 'succ'
                if (response.data && response.data.msg === 'succ') {
                    // SweetAlert success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data updated successfully.',
                    });

                    // Reload data and hide the form
                    loadData();
                    isFormVisible.value = false;
                } else {
                    // If the response does not have the expected 'msg' property value
                    throw new Error('Unexpected response format');
                }
            } catch (error) {
                console.error('Error updating client data:', error);
                // SweetAlert error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update data. Please try again.',
                });
            }
        };

        const deleteClient = async (clientDetailId, index) => {
            console.log(clientDetailId);

            if (clientDetailId) {
                try {
                    // Show a confirmation dialog before deleting
                    const result = await Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    });

                    if (result.isConfirmed) {
                        // Send a request to the server to delete the client detail and associated files
                        await axios.delete(`/api/delete-client/${clientDetailId}`);

                        // SweetAlert success notification for deletion with a 3-second timer
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Client deleted successfully.',
                            timer: 3000, // 3 seconds
                            showConfirmButton: false, // Hide the "OK" button
                        });

                        // Reload the page after successful deletion
                        window.location.reload();
                    }
                } catch (error) {
                    console.error('Error deleting client:', error);
                    // Handle error as needed

                    // SweetAlert error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to delete client. Please try again.',
                    });
                }
            }

            // Remove the client from the clientsFile array
            clientsFile.splice(index, 1);
        };





        // function for filtering data.
        const start_date = ref();
        const end_date = ref();
        const searchData = async () => {
            try {
                const response = await axios.post(`/api/search-data/${clientDetails.branch_id}`, {
                    agent: clientDetails.agent,
                    cpn: clientDetails.cpn,
                    cpm: clientDetails.cpm,
                    start_date: start_date.value,
                    end_date: end_date.value,
                    category: clientDetails.category,
                    received: clientDetails.received,
                });

                all_clients.value = response.data;
                // Handle the response from the server 
                //   console.log('Search results:', response.data);
            } catch (error) {
                console.error('Error searching data:', error);
                // Handle errors as needed
            }
        };


        const getPdf = async (pdfId) => {
            console.log(pdfId);
            if (pdfId) {
                try {
                    const response = await axios.post(`/api/get-pdf/${pdfId}`, null, { responseType: 'blob' });

                    const blob = new Blob([response.data], { type: 'application/pdf' });
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = `client_${pdfId}_pdf.pdf`;

                    // Append the link to the document body
                    document.body.appendChild(link);

                    // Trigger the click event
                    link.click();

                    // Remove the link from the document body after the click event
                    document.body.removeChild(link);
                } catch (error) {
                    console.error('Error generating PDF:', error);
                }
            }
        };

        const exportClientsUrl = ref('/export-clients');

        const categories = ref([]);

        onMounted(async () => {
            try {
                const response = await axios.get('/api/get-category-data');
                categories.value = response.data;
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        });



</script>

        <template>
            <div class="bg-white-200 shadow-lg p-6 mx-4 rounded-xl">
                <div v-if="isFormVisible">
                    <form action="" class="my-2">

                        <p
                            class="bg-gradient-to-r from-fuchsia-500 to-cyan-500 text-white text-center text-2xl mb-2 p-2 rounded-lg">
                            CASH-IN FORM</p>

                        <!-- static form -->
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="" class="font-normal">Category</label>
                                <select name="cars" id="cars" v-model="clientDetails.category"
                                    class="w-full border border-gray-300 rounded-xl">

                                    <option>{{ clientDetails.category }}</option>

                                    <option v-for="category in categories" :key="category.id"
                                        :value="category.category">
                                        {{ category.category }}
                                    </option>

                                </select>
                            </div>
                            <div>
                                <label for="">Date & Time</label>
                                <input type="date" name="date" id="" v-model="clientDetails.date"
                                    class="w-full border border-gray-300 rounded-xl">
                            </div>
                            <div>
                                <label for="">Amount</label>
                                <input type="number" name="amount" id="" placeholder="Enter Amount"
                                    v-model="clientDetails.amount" class="w-full border border-gray-300 rounded-xl">
                            </div>
                            <div>
                                <label for="">Tax</label>
                                <input type="number" name="tax" id="" v-model="clientDetails.tax"
                                    placeholder="Total Tax Amount" class="w-full border border-gray-300 rounded-xl">
                            </div>
                            <div>
                                <label for="">Contactable Person Name</label>
                                <input type="text" name="person_name" id="" placeholder="Person Name"
                                    v-model="clientDetails.cpn" class="w-full border border-gray-300 rounded-xl">
                            </div>
                            <div>
                                <label for="">Contactable Person Mobile</label>
                                <input type="number" name="person_mobile" id="" placeholder=""
                                    v-model="clientDetails.cpm" class="w-full border border-gray-300 rounded-xl">
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
                            <!-- 
                            <div>
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
                                <input type="file" ref="imageInput" @change="handleImageChange" name="image" id=""
                                    class="w-full border border-gray-300 rounded-lg p-1 bg-white">
                            </div>
                        </div>

                        <!-- checkbox -->
                        <div>
                            <input type="checkbox" name="" id="" v-model="showClient"
                                class="w-4 h-4 my-3 mx-2 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="">File </label>
                        </div>

                        <!-- horizontal line -->
                        <hr class="mb-2">

                        <!-- dynamic form field -->
                        <div v-if="showClient">
                            <div v-for="(client, index) in clientsFile" :key="index">
                                <div class="flex justify-between">
                                    <div class="text-normal font-bold">Form {{ index + 1 }}</div>
                                    <button class="text-red-500" @click="removeClient(index)">X</button>
                                </div>
                                <div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="">Name</label>
                                            <input type="text" name="" id="" v-model="client.name"
                                                placeholder="File Holder Name"
                                                class="w-full border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="">Passport</label>
                                            <input type="text" name="" id="" placeholder="Passport No"
                                                v-model="client.passport"
                                                class="w-full border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="">Nationality</label>
                                            <input type="text" name="" id="" placeholder="Your Nationality"
                                                v-model="client.nationality"
                                                class="w-full border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="">Applied Country</label>
                                            <input type="text" name="" id="" placeholder="Country you applied for"
                                                v-model="client.appliedCountry"
                                                class="w-full border border-gray-300 rounded-lg">
                                        </div>

                                        <div>
                                            <button class="text-2xl p-2" @click.prevent="addClient">+</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    <div>
                        <button @click.prevent="updateData"
                            class="bg-purple-900 px-3 py-1 rounded text-white mt-1 mb-2">Update</button>
                    </div>
                </div>



                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-purple-100 mt-2">
                    <div class="p-4 bg-gradient-to-r from-fuchsia-500 to-cyan-500">
                        <div class="flex items-center justify-end text-white">
                            <!-- Date Range Picker -->
                            <div class="flex items-center space-x-4">
                                <form action="" @submit.prevent="searchData" class="flex flex-normal space-x-4">
                                    <div class="flex flex-col">
                                        <label for="searchByName"
                                            class="block text-sm font-medium text-gray-600">Search_By_Agent</label>
                                        <input type="text" id="agent" name="agent" v-model="clientDetails.agent"
                                            placeholder="Enter agent name"
                                            class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="searchByName"
                                            class="block text-sm font-medium text-gray-600">Search_By_Name</label>
                                        <input type="text" id="pbn" name="cpn" v-model="clientDetails.cpn"
                                            placeholder="Enter name"
                                            class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="searchByName"
                                            class="block text-sm font-medium text-gray-600">Search_By_Number</label>
                                        <input type="number" id="pbm" name="cpm" v-model="clientDetails.cpm"
                                            placeholder="Enter mobile number"
                                            class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="startDate" class="block text-sm font-medium text-gray-600">Start
                                            Date</label>
                                        <input type="date" id="startDate" name="start_date" v-model="start_date"
                                            class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="endDate" class="block text-sm font-medium text-gray-600">End
                                            Date</label>
                                        <input type="date" id="endDate" name="end_date" v-model="end_date"
                                            class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                    </div>


                                    <!-- Other Filters (Add your own as needed) -->
                                    <div class="flex flex-col">
                                        <label for="category"
                                            class="block text-sm font-medium text-gray-600">Category</label>
                                        <select id="category" name="category" v-model="clientDetails.category"
                                            class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            <option value="">__select an option__</option>
                                            <!-- <option value="category-1">category-1</option>
                                            <option value="category-2">category-2</option>
                                            <option value="category-3">category-3</option>
                                            <option value="category-4">category-4</option>
                                            <option value="category-3">category-5</option>
                                            <option value="category-6">category-6</option> -->
                                            <option v-for="category in categories" :key="category.id"
                                                :value="category.category">
                                                {{ category.category }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="category" class="block text-sm font-medium text-gray-600">Payment
                                            Mode</label>
                                        <select id="category" name="payment_mode" v-model="clientDetails.received"
                                            class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            <option value="">__select an option__</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank-transfer">Bank Transfer</option>
                                            <option value="check-book">Check-book</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center gap-1 mt-4 mb-2 ml-3">

                                        <button type="submit"
                                            class="bg-gradient-to-r from-rose-400 to-red-500 px-3 py-2 text-white border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">Filter
                                        </button>

                                        <div>
                                            <a :href="exportClientsUrl"
                                                class="bg-gradient-to-r from-amber-500 to-pink-500 px-3 py-2 rounded-md ">export
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="p-4 responsive">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                            <thead
                                class="text-xs uppercase bg-gradient-to-r from-blue-600 to-violet-600 text-white rounded-lg">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Payment Mode
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment By Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment By Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tax
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Agent
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        files
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Invoice
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="(data, index) in all_clients" :key="'client' + index"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-md">

                                    <td class="w-4 p-4">
                                        {{ index + 1 }}
                                    </td>

                                    <td class="w-4 p-4">
                                        {{ data.category }}
                                    </td>

                                    <td class="w-4 p-4">
                                        {{ data.amount }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ data.date }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ data.received }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ data.cpn }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ data.cpm }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ data.tax }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ data.agent }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div href="" class="bg-purple-600 text-white rounded-sm px-2 py-1">
                                            files({{ data.client_files.length }})</div>
                                    </td>
                                    <!-- <td class="px-6 py-4">
                                        <img :src="'/' + data.image_path" alt="image" class="w-40 h-30">
                                    </td> -->
                                    <td class="px-6 py-4">
                                        <img v-if="data.image_path" :src="'/' + data.image_path" alt="image"
                                            class="w-40 h-30">
                                        <span v-else>No Image</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <div class="mr-2">
                                                <div href="" @click.prevent="editClient(data)"
                                                    class="items-center justify-center cursor-pointer text-blue rounded-lg text-lg p-1 hover:bg-blue-200">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="#" @click.prevent="deleteClient(data.id, index)"
                                                    class=" items-center justify-center text-red text-lg rounded-lg p-1 hover:bg-red-200"><i
                                                        class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" @click.prevent="getPdf(data.id)"
                                            class="bg-gradient-to-r from-pink-500 to-yellow-500 cursor-pointer hover:bg-blue-500 text-white rounded px-3 py-1 ">pdf</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>