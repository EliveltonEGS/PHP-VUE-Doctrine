<template>
    <div id="app" class="container mt-4 text-center">
        <router-link to="/" class="btn btn-primary btn-sm m-2">Products</router-link>
        <router-link to="/create" class="btn btn-primary btn-sm">Create</router-link>
        <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: 'App',
    components: {
        
    }
}
</script>
