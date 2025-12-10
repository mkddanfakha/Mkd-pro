import api from './axios';

export const homeService = {
    getHomeData: () => api.get('/home'),
};

export const serviceService = {
    getAll: () => api.get('/services'),
    getById: (id) => api.get(`/services/${id}`),
};

export const projectService = {
    getAll: () => api.get('/portfolio'),
    getById: (id) => api.get(`/portfolio/${id}`),
};

export const aboutService = {
    getAbout: () => api.get('/about'),
};

export const contactService = {
    sendMessage: (data) => api.post('/contact', data),
};

