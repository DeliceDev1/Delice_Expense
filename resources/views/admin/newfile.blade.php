<div class="grid grid-cols-2 gap-2">
    <div>
        <label for="" class="font-normal">Category</label>
        <select name="cars" id="cars" v-model="clientDetails.category"
            class="w-full border border-gray-300 rounded-xl">
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
        <select name="" id="" class="w-full border border-gray-300 rounded-xl">
            <option value="cash">Cash</option>
            <option value="bank-transfer">Bank Transfer</option>
            <option value="check-book">Check Book</option>
            <option value="others">Others</option>
        </select>
    </div>
    <div>
        <label for="">Currency</label>
        <input type="text" name="" id="" class="w-full border border-gray-300 rounded-xl"
            placeholder="Tk">
    </div>
    <div>
        <label for="">Images</label>
        <input type="file" name="" id=""
            class="w-full border border-gray-300 rounded-lg p-1 bg-white">
    </div>
</div>
