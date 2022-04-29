/**
 * Save the user data in the session storage to grab it on the thank you page
 *
 * @param {object} userData - A object containing user data
 *
 * @example
 *
 *     setUserData({"email": "testemail@gmail.com", "phone": "12345868"})
 */
function setUserData(userData){
  if (!userData) return;
  Object.keys(userData).forEach(function(data) {
    window.sessionStorage.setItem(data, userData[data]);
  });
};

/**
 * Grab the user data from the session storage and push it into enhanced_conversion_data object
 *
 * @param {...string} userData - user data to collect
 *
 * @example
 *
 *     getUserData("email", "phone")
 */
function getUserData(...userData) {
  if (!userData) return;
  userData.forEach(function (data){
    if (window.sessionStorage.getItem(data)) enhanced_conversion_data[data] = window.sessionStorage.getItem(data); 
  });
};

/**
 * @type {object} - object to store the customer data, must be a global scope
 */
const enhanced_conversion_data = {};
