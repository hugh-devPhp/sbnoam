console.log("password.js marche");
//Javascript tags
const old_passwordField = document.querySelector("#change-password-form-1");
const new_passwordField = document.querySelector("#change-password-form-2");
const C_new_passwordField = document.querySelector("#change-password-form-3");
const showOld_passwordField = document.querySelector("#old_psd");
const showPasswordToggle = document.querySelector("#new_psd");
const showC_PasswordToggle = document.querySelector("#c_new_psd");


//old password show/hide
const old_handleToggleInput = (e) => {
    if (showOld_passwordField.classList.contains("fa-eye")) {
        showOld_passwordField.classList.remove("fa-eye");
        showOld_passwordField.classList.add("fa-eye-slash");
        old_passwordField.setAttribute("type", "text")
    } else {
        showOld_passwordField.classList.remove("fa-eye-slash");
        showOld_passwordField.classList.add("fa-eye");
        old_passwordField.setAttribute("type", "password")

    }
};

showOld_passwordField.addEventListener('click', old_handleToggleInput);

//password show/hide
const handleToggleInput = (e) => {
    if (showPasswordToggle.classList.contains("fa-eye")) {
        showPasswordToggle.classList.remove("fa-eye");
        showPasswordToggle.classList.add("fa-eye-slash");
        new_passwordField.setAttribute("type", "text")
    } else {
        showPasswordToggle.classList.remove("fa-eye-slash");
        showPasswordToggle.classList.add("fa-eye");
        new_passwordField.setAttribute("type", "password")

    }
};

showPasswordToggle.addEventListener('click', handleToggleInput);




//Confirm password show/hide
const c_handleToggleInput = (e) => {
    if (showC_PasswordToggle.classList.contains("fa-eye")) {
        showC_PasswordToggle.classList.remove("fa-eye");
        showC_PasswordToggle.classList.add("fa-eye-slash");
        C_new_passwordField.setAttribute("type", "text")
    } else {
        showC_PasswordToggle.classList.remove("fa-eye-slash");
        showC_PasswordToggle.classList.add("fa-eye");
        C_new_passwordField.setAttribute("type", "password")

    }
};

showC_PasswordToggle.addEventListener('click', c_handleToggleInput);