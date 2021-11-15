import http from '../http-common'

class ProductDataService {

    list() {

        return http.get('/list');
        
    }

    create(data) {

        return http.post('/create', data);

    }

    update(id, data) {

        return http.post(`/update/${id}`, data);

    }

    delete(id) {
            
        return http.delete(`/delete/${id}`);
    
    }

    findId(id) {
            
        return http.get(`/find-id/${id}`);
    
    }

}

export default new ProductDataService()