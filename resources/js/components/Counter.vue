<script setup>
    import { ref, reactive } from 'vue';

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
        image: null
     });


     //for image 
     const imageInput = ref(null);

    //for multiple images
    //  const handleImageChange = (event) => {
    //     const files = event.target.files;
    //     console.log('Selected Files:', files);
    //     clientDetails.images = Array.from(files);
    // };

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
            passport: null ,
            nationality:'',
            appliedCountry:''
        }
        ]);
    
    // variable to control checkbox
    const showClient=ref(false);

    
    // function to create new dynamic field after clicking +
    const addClient = () => {
    clientsFile.push({ name: '', passport: null , nationality:'', appliedCountry:''});
    };


    // function to remove dynamic form
    const removeClient = (index)=>{
        clientsFile.splice(index, 1);
    }

    // function to handle form data
    const submitData = async() => {
        const formData = new FormData();
            //for managing multiple images.
            // clientDetails.images.forEach((image, index) => {
            //     formData.append(`image${index + 1}`, image);
            // });

            formData.append('image',clientDetails.image);
            formData.append('category', clientDetails.category);
            formData.append('date', clientDetails.date);
            formData.append('amount', clientDetails.amount);
            formData.append('tax', clientDetails.tax);
            formData.append('agent', clientDetails.agent);
            formData.append('cpm', clientDetails.cpm);
            formData.append('cpn', clientDetails.cpn);
            formData.append('received', clientDetails.received);
            formData.append('currency', clientDetails.currency);

            clientsFile.forEach((client, index) => {
                formData.append(`clientFile[${index}][name]`, client.name);
                formData.append(`clientFile[${index}][passport]`, client.passport);
                formData.append(`clientFile[${index}][nationality]`, client.nationality);
                formData.append(`clientFile[${index}][appliedCountry]`, client.appliedCountry);
            });


        const data = await axios.post('/api/store-client-data', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });
    }

</script>

<template>
    <div class="bg-white-200 shadow-lg p-6 mx-4 rounded-xl">
        <form action="" class="my-2">
            <p class="bg-purple-700 text-white text-center text-2xl mb-2 p-2 rounded-lg">CASH-IN FORM</p>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="" class="font-normal">Category</label>
                    <select name="cars" id="cars" v-model="clientDetails.category"
                        class="w-full border border-gray-300 rounded-xl">
                        <option value="">--Choose a category-- </option>
                        <option value="category-1">category-1</option>
                    </select>
                </div>
                <div>
                    <label for="">Date & Time</label>
                    <input type="date" name="date" id="" v-model="clientDetails.date"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Amount</label>
                    <input type="number" name="amount" id="" placeholder="Enter Amount" v-model="clientDetails.amount"
                        class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Tax</label>
                    <input type="number" name="tax" id="" v-model="clientDetails.tax"
                        placeholder="Total Tax Amount"
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
                    <input type="text" name="currency" value="Tk" id="" placeholder="Tk" class="w-full border border-gray-300 rounded-xl">
                </div>

                <div>
                    <label for="">Agent</label>
                    <input type="text" name="agent" id="" v-model="clientDetails.agent" placeholder="Enter the agent name" class="w-full border border-gray-300 rounded-xl">
                </div>
                <div>
                    <label for="">Images</label>
                    <input type="file" ref="imageInput" @change="handleImageChange" name="image" id="" class="w-full border border-gray-300 rounded-lg p-1 bg-white">
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
                    <div class="text-normal font-bold">Form {{ index+1 }}</div>
                    <button class="text-red-500" @click="removeClient(index)">X</button>
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="" id=""
                                v-model="client.name"
                                placeholder="File Holder Name"
                                class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Passport No</label>
                            <input type="number" name="" id="" 
                                    placeholder="Passport No"
                                    v-model="client.passport"
                                    class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Nationality</label>
                            <input type="text" name="" id=""
                                    placeholder="Your Nationality"
                                    v-model="client.nationality"
                                    class="w-full border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label for="">Applied Country</label>
                            <input type="text" name="" id=""
                                placeholder="Country you applied for"
                                v-model="client.appliedCountry"
                                class="w-full border border-gray-300 rounded-lg">
                        </div>

                        <div>
                            <button 
                            class="text-2xl p-2"
                            @click="addClient">+</button>
                            
                        </div>

                    
                </div>
                
                </div>
            </div>
        </div>

        <div>
            <button @click="submitData" class="bg-purple-900 px-3 py-1 rounded text-white mt-1">create</button>
        </div>

       
    </div>

</template>