<script setup>
    import { ref, reactive } from 'vue';

    const clientsFile = reactive([
    { name: '',  passport: null , nationality:'', appliedCountry:''},
    ]);

    const showClient=ref(false);

    const addClient = () => {
    clientsFile.push({ name: '', passport: null , nationality:'', appliedCountry:''});
    };

    const removeClient = (index)=>{
        clientsFile.splice(index, 1);
    }
</script>

<template>
    <div class="bg-white-200 shadow-lg rounded p-6 ">
        <form action="" class="my-2">
            <p class="bg-purple-700 text-white text-center text-2xl mb-2">Cash-in Details</p>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="" class="font-normal">Category</label>
                    <select name="cars" id="cars"
                        class="w-full border border-gray-300 rounded">
                        <option value="category-1">category-1</option>
                        <option value="category-2">category-2</option>
                        <option value="category-3">category-3</option>
                        <option value="category-4">category-4</option>
                        <option value="category-3">category-5</option>
                        <option value="category-6">category-6</option>
                    </select>
                </div>
                <div>
                    <label for="">Date & Time</label>
                    <input type="date" name="" id=""
                        class="w-full border border-gray-300 rounded">
                </div>
                <div>
                    <label for="">Amount</label>
                    <input type="number" name="" id="" placeholder="Enter Amount"
                        class="w-full border border-gray-300 rounded">
                </div>
                <div>
                    <label for="">Tax</label>
                    <input type="number" name="" id=""
                        placeholder="Total Tax Amount"
                        class="w-full border border-gray-300 rounded">
                </div>
                <div>
                    <label for="">Contactable Person Name</label>
                    <input type="text" name="" id="" placeholder="Person Name"
                        class="w-full border border-gray-300 rounded">
                </div>
                <div>
                    <label for="">Contactable Person Mobile</label>
                    <input type="number" name="" id="" placeholder=""
                        class="w-full border border-gray-300 rounded">
                </div>
                <div>
                    <label for="">Received Mode</label>
                    <input type="text" name="" id=""
                        placeholder="What is Your Received Mode"
                        class="w-full border border-gray-300 rounded">
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
                    <div>Form {{ index+1 }}</div>
                    <button @click="removeClient(index)">X</button>
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="" id=""
                                v-model="client.name"
                                placeholder="File Holder Name"
                                class="w-full border border-gray-300 rounded">
                        </div>
                        <div>
                            <label for="">Passport No</label>
                            <input type="number" name="" id="" 
                                    placeholder="Passport No"
                                    v-model="client.passport"
                                    class="w-full border border-gray-300 rounded">
                        </div>
                        <div>
                            <label for="">Nationality</label>
                            <input type="text" name="" id=""
                                    placeholder="Your Nationality"
                                    v-model="client.nationality"
                                class="w-full border border-gray-300 rounded">
                        </div>
                        <div>
                            <label for="">Applied Country</label>
                            <input type="text" name="" id=""
                                placeholder="Country you applied for"
                                v-model="client.appliedCountry"
                                class="w-full border border-gray-300 rounded">
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
            <button class="bg-purple-900 px-3 py-1 rounded text-white mt-1">create</button>
        </div>

       
    </div>

</template>