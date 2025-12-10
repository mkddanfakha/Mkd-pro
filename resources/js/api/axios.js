import axios from 'axios';

const api = axios.create({
    baseURL: '/api/v1',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
    withCredentials: true, // Important : permet de maintenir les cookies de session entre les requêtes
});

// Intercepteur pour les erreurs
api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response) {
            // Erreur de réponse du serveur
            return Promise.reject(error.response.data);
        } else if (error.request) {
            // Requête envoyée mais pas de réponse
            return Promise.reject({ message: 'Erreur de connexion au serveur' });
        } else {
            // Erreur lors de la configuration de la requête
            return Promise.reject({ message: error.message });
        }
    }
);

export default api;

