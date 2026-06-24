

window.onload = function() {

    const logoutButton = document.getElementById("logout-btn");
    logoutButton.addEventListener('click', function(){
        window.location = '../controllers/logout.php';
    })

}