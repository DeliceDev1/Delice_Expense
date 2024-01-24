<script setup>
    import {
        ref,
        reactive
    } from 'vue';
    const clientDetails = reactive({
        category: '',
        date: null,
        amount: 0,
        image: null
    });

    
    const submitData = async () => {
        const data = await axios.post('/api/store-client-data', {
            clientsFile: clientsFile,
            clientDetails: clientDetails
        })
    }
</script>

<template>
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="" class="font-normal">Category</label>
            <select name="cars" id="cars" v-model="clientDetails.category"
                class="w-full border border-gray-300 rounded-xl">
                <option value="category-1">category-1</option>
                <option value="category-2">category-2</option>
            </select>
        </div>
        <div>
            <label for="">Date & Time</label>
            <input type="date" name="date" id="" v-model="clientDetails.date"
                class="w-full border border-gray-300 rounded-xl">
        </div>
        <div>
            <label for="">Images</label>
            <input type="file" name="iamge" id=""
                class="w-full border border-gray-300 rounded-lg p-1 bg-white">
        </div>
    </div>
</template>



<script setup>
    import {
        ref,
        reactive
    } from 'vue';
    const clientDetails = reactive({
        category: '',
        date: null,
        amount: 0,
        image: null
    });
    const imageInput = ref(null);

    const handleImageChange = (event) => {
        const file = event.target.files[0];
        clientDetails.image = file;
    };

    const submitData = async () => {
        const formData = new FormData();
        formData.append('image', clientDetails.image);
        formData.append('category', clientDetails.category);
        formData.append('date', clientDetails.date);
        formData.append('amount', clientDetails.amount);

        const data = await axios.post('/api/store-client-data', formData);
    };
</script>

<template>
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="" class="font-normal">Category</label>
            <select name="cars" id="cars" v-model="clientDetails.category"
                class="w-full border border-gray-300 rounded-xl">
                <option value="category-1">category-1</option>
                <option value="category-2">category-2</option>
            </select>
        </div>
        <div>
            <label for="">Date & Time</label>
            <input type="date" name="date" id="" v-model="clientDetails.date"
                class="w-full border border-gray-300 rounded-xl">
        </div>
        <div>
            <label for="">Images</label>
            <input type="file" name="image" ref="imageInput" @change="handleImageChange"
                class="w-full border border-gray-300 rounded-lg p-1 bg-white">
        </div>
    </div>
</template>
