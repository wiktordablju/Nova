const logoutBtn = document.querySelector("#logout-btn")
const manageBtn = document.querySelector("#manage-btn")

function logout() {
	window.location.href = "./../php/logout.php"
}

function manage() {
	window.location.href = "./manage.php"
}

logoutBtn.addEventListener("click", logout)
manageBtn.addEventListener("click", manage)
