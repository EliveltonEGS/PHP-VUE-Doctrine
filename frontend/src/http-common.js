import axios from 'axios'

export default axios.create({
    baseURL: 'http://localhost/PHP-VUE',
    headers: {
        'Content-Type': 'application/json'
    }
})