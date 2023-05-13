// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyA6i1g4a_SZoDnRzkH8XTBE8Y6m214L4bA",
  authDomain: "verdeando-3baf2.firebaseapp.com",
  databaseURL: "https://verdeando-3baf2-default-rtdb.firebaseio.com",
  projectId: "verdeando-3baf2",
  storageBucket: "verdeando-3baf2.appspot.com",
  messagingSenderId: "481274949690",
  appId: "1:481274949690:web:1a1754d1eb01d39c328503",
  measurementId: "G-0ZLZCNC16P"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);