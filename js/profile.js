const logoutBtn = document.querySelector("#logout-btn")

function logout() {
	window.location.href = "./../php/logout.php"
}

logoutBtn.addEventListener("click", logout)
