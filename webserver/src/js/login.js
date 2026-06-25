import form from "./components/form.js";

window.onload = function() {

  
    const loginForm = document.getElementById('login-form');
    const submitButton = document.getElementById('submit-btn');
    const signupFormSection = document.getElementById("signup-form-section");

    const signupFormRevealButtonIcon = document.getElementById("signup-form-reveal-btn-icon");
    const signupFormRevealButton = document.getElementById('signup-form-reveal-btn');
  

    signupFormRevealButton.addEventListener('click', function() {

        if(signupFormRevealButtonIcon.classList.contains("fa-angle-down")) {
            signupFormSection.innerHTML = "";
        } else {
            signupFormSection.classList.toggle("show")
            signupFormSection.insertAdjacentHTML("beforeend", form({
                formClassNames: 'is-flex is-flex-direction-column',
                formId: 'signup-form',
                fieldsSectionClassNames: 'is-flex is-flex-direction-column mt-5',
                formButtonsSectionClassNames: 'is-flex is-flex-direction-row my-5',
                fields: [
                    {
                        label: 'Email',
                        type: 'email',
                        name: 'email',
                        placeholder: 'sandrine@gmail.com',
                        inputClassNames: 'input'
                    },
                    {
                        label: 'Password',
                        type: 'password',
                        name: 'password',
                        placeholder: '**********',
                        inputClassNames: 'input'
                    }
                ],
                buttons: [
                    { type: 'submit', classNames: 'is-primary mr-5', id: 'signup-submit-btn', content: 'Sign up' },
                    { type: 'reset', classNames: 'is-danger', id: 'signup-reset-btn', content: 'Reset' }
                ]
            }))
        }

       

        signupFormRevealButtonIcon.classList.toggle("fa-angle-up"); 
        signupFormRevealButtonIcon.classList.toggle("fa-angle-down");
  
      
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