<template>
    <div>

        <h1>{{ title }}</h1>

        <div class="row">
            <div class="form-group col-md-6">
                <input v-model="name" type="text" name="name" class="form-control" placeholder="Inform the name">
            </div>

            <div class="form-group col-md-6">
                <input v-model="price" type="text" name="price" class="form-control" placeholder="Inform the price">
            </div>

            <div class="form-group col-md-12 mt-2">
                <button @click="create" class="btn btn-success btn-sm">Create</button>
            </div>
        </div>

    </div>
</template>

<script>

import ProductDataService from '../services/ProductDataService'

export default {
    data() {
        return {
            name: '',
            price: '',
            title: 'Create Product'
        }
    },
    methods: {
        create() {

            let product = {
                name: this.name,
                price: this.price
            }
            
            ProductDataService.create(product).then(response => {
                
                alert(response.data)
                this.$router.push('/')
                
            }).catch(error => {
                
                console.log(error)
                
            })

        }   
    }
}
</script>

