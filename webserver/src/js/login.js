import form from "./components/form.js";

window.onload = function() {

  
    const loginForm = document.getElementById('login-form');
    const submitButton = document.getElementById('submit-btn');
    const transformLoginFormToSignupFormButton = document.getElementById('transform-login-form-to-signup-form-btn');
    const loginPageTitle = document.getElementById("login-page-title");
    const loginPageMsg = document.getElementById("login-page-msg");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    transformLoginFormToSignupFormButton.addEventListener('click', function(e) {
        if(e.target.innerText == "Log in") {
            loginPageTitle.innerText = "Bank | Login";
            loginPageMsg.innerText = "No account yet ...";
            e.target.innerText = "Sign up"
            emailInput.setAttribute('name', 'email');
            passwordInput.setAttribute('name', 'password');

        } else {
                loginPageTitle.innerText = "Bank | Register";
                loginPageMsg.innerText = "Already a member ...";
                e.target.innerText = "Log in"
                emailInput.setAttribute('name', 'register_email');
                passwordInput.setAttribute('name', 'register_password');

        }
        
      
    })

    submitButton.disabled = true
    setTimeout(() => {
             submitButton.disabled = false;
    }, 2000);

    const resetButton = document.getElementById('reset-btn');
    submitButton.addEventListener('click', (e) => {
        e.target.disabled = resetButton.disabled = true;
        e.target.classList.add('is-loading');
        loginForm.submit();

    })

  
    resetButton.addEventListener('click', (e) => {
        submitButton.disabled = false;
    })

}