import './bootstrap';
import axios from 'axios';

function getTokenFromLocalStorage() {
  return localStorage.getItem('token');
}

axios.interceptors.request.use(
  function (config) {
    const token = getTokenFromLocalStorage();

    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`;
    }

    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);