<template>
    <div>
        <div class="text-center"><h1>{{ title }}</h1></div>
        <router-view/>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in products" :key="index">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td>
                        <router-link :to="{path: '/update/'+ item.id}" class="btn btn-warning btn-sm">Update</router-link>
                        <router-link :to="{path: '/delete/'+ item.id}" class="btn btn-danger btn-sm m-1">Remove</router-link>
                    </td>
                </tr>
            </tbody>
        </table>

        <router-view></router-view>
    </div>
</template>
<script>

import ProductDataService from '../services/ProductDataService'

export default {
    data() {
        return {
            products: [],
            title: 'List Products'
        }
    },
    methods: {
        list() {

            ProductDataService.list()
            .then(response => {

                this.products = response.data

            }).catch(error => {

                console.log(error)

            })

        },
        remove(id) {

            ProductDataService.delete(id)
            .then(response => {

                console.log(response.data)
                this.list()

            }).catch(error => {

                console.log(error)

            })


        }
    },
    created() {
        this.list()
    },
}
</script>