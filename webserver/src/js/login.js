window.onload = function() {


    const loginForm = document.getElementById('login-form');
    const submitButton = document.getElementById('submit-btn');
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