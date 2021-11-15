<template lang="">
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
                <button @click="remove" class="btn btn-success btn-sm">Remove</button>
            </div>
        </div>
    </div>
</template>
<script>

import ProductDataService from '../services/ProductDataService';

export default {
    data() {
        return {
            title: 'Remove Product',
            name: '',
            price: ''
        }
    },
    methods: {
        remove() {

            let id = this.$route.params.id
            ProductDataService.delete(id).then(response => {

                console.log(response.data)
                this.$router.push('/')

            }).catch(error => {

                console.log(error)

            })

        },
        findById() {

            let id = this.$route.params.id
            ProductDataService.findId(id).then(response => {

                this.name = response.data.name
                this.price = response.data.price

            }).catch(error => {

                console.log(error)

            })

        }
    },
    created() {
        this.findById()
    },
}
</script>