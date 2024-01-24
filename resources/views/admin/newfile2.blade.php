<script setup>
    import {
        ref,
        reactive
    } from 'vue';

    // object to handle the static part of form
    const clientDetails = reactive({
        category: '',
        date: null,
        images: []
    });



    //for image 
    const imageInput = ref(null);

    //for iamge
    const handleImageChange = (event) => {
        const files = event.target.files;
        console.log('Selected Files:', files);
        clientDetails.images = Array.from(files);
    };

    const submitData = async () => {
        const formData = new FormData();

        clientDetails.images.forEach((image, index) => {
            formData.append(`image${index + 1}`, image);
        });
        formData.append('category', clientDetails.category);
        formData.append('date', clientDetails.date);

        const data = await axios.post('/api/store-client-data', {
            formData
        })
    }
</script>

<template>
    <div class="bg-white-200 shadow-lg p-6 mx-4 rounded-xl">
        <form action="" class="my-2">
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
                    <input type="file" ref="imageInput" @change="handleImageChange" name="images" id=""
                        multiple class="w-full border border-gray-300 rounded-lg p-1 bg-white">
                </div>
            </div>
        </form>
    </div>

</template>
