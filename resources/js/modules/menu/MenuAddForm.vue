<template>
    <div class="add_form_wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" v-model="food.item">
            </div>
            <div class="form-group">
                <label for="name">Select Category</label>
                <multiselect v-model="food.category" :options="categories"></multiselect>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="number" class="form-control" v-model="food.price">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "MenuAdd",
        props: ['categories'],
        data(){
          return {
              food: {
                  item: '',
                  category: '',
                  price: 100
              }
          }
        },
        methods: {
            handleSubmit(){
                let postData = this.food;
                postData.restoId = this.restoId;

                window.axios.post('api/add-menu', postData)
                    .then(reponse => {
                        console.log(reponse.data)
                    });
            }
        }
    }
</script>

<style scoped>

</style>